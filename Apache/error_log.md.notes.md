ErrorLogFormat Directive

Description:	Format specification for error log entries
Syntax:	ErrorLogFormat [connection|request] format
Context:	server config, virtual host
Status:	Core
Module:	core
ErrorLogFormat allows to specify what supplementary information is logged in the error log in addition to the actual log message.

#Simple example

ErrorLogFormat "[%t] [%l] [pid %P] %F: %E: [client %a] %M"


Specifying connection or request as first parameter allows to specify additional formats, causing additional information to be logged when the first message is logged for a specific connection or request, respectively. This additional information is only logged once per connection/request. If a connection or request is processed without causing any log message, the additional information is not logged either.

It can happen that some format string items do not produce output. For example, the Referer header is only present if the log message is associated to a request and the log message happens at a time when the Referer header has already been read from the client. If no output is produced, the default behavior is to delete everything from the preceding space character to the next space character. This means the 
log line is implicitly divided into fields on non-whitespace to whitespace transitions. If a format string item does not produce output, the whole field is omitted. For example, if the remote address %a in the log format [%t] [%l] [%a] %M  is not available, the surrounding brackets are not logged either. Space characters can be escaped with a backslash to prevent them from delimiting a field. The combination '% ' (percent space) is a zero-width field delimiter that does not produce any output.

The above behavior can be changed by adding modifiers to the format string item. A - (minus) modifier causes a minus to be logged if the respective item does not produce any output. In once-per-connection/request formats, it is also possible to use the + (plus) modifier. If an item with the plus modifier does not produce any output, the whole line is omitted.

A number as modifier can be used to assign a log severity level to a format item. The item will only be logged if the severity of the log message is not higher than the specified log severity level. The number can range from 1 (alert) over 4 (warn) and 7 (debug) to 15 (trace8).

For example, here's what would happen if you added modifiers to the %{Referer}i token, which logs the Referer request header.

Modified Token	Meaning
%-{Referer}i	Logs a - if Referer is not set.
%+{Referer}i	Omits the entire line if Referer is not set.
%4{Referer}i	Logs the Referer only if the log message severity is higher than 4.
Some format string items accept additional parameters in braces.

Format String	Description
%%	The percent sign
%a	Client IP address and port of the request
%{c}a	Underlying peer IP address and port of the connection (see the mod_remoteip module)
%A	Local IP-address and port
%{name}e	Request environment variable name
%E	APR/OS error status code and string
%F	Source file name and line number of the log call
%{name}i	Request header name
%k	Number of keep-alive requests on this connection
%l	Loglevel of the message
%L	Log ID of the request
%{c}L	Log ID of the connection
%{C}L	Log ID of the connection if used in connection scope, empty otherwise
%m	Name of the module logging the message
%M	The actual log message
%{name}n	Request note name
%P	Process ID of current process
%T	Thread ID of current thread
%{g}T	System unique thread ID of current thread (the same ID as displayed by e.g. top; currently Linux only)
%t	The current time
%{u}t	The current time including micro-seconds
%{cu}t	The current time in compact ISO 8601 format, including micro-seconds
%v	The canonical ServerName of the current server.
%V	The server name of the server serving the request according to the UseCanonicalName setting.
\  (backslash space)	Non-field delimiting space
%  (percent space)	Field delimiter (no output)
The log ID format %L produces a unique id for a connection or request. This can be used to correlate which log lines belong to the same connection or request, which request happens on which connection. A %L format string is also available in mod_log_config to allow to correlate access log entries with error log lines. If mod_unique_id is loaded, its unique id will be used as log ID for requests.

#Example (default format for threaded MPMs)
ErrorLogFormat "[%{u}t] [%-m:%l] [pid %P:tid %T] %7F: %E: [client\ %a] %M% ,\ referer\ %{Referer}i"
This would result in error messages such as:

[Thu May 12 08:28:57.652118 2011] [core:error] [pid 8777:tid 4326490112] [client ::1:58619] File does not exist: /usr/local/apache2/htdocs/favicon.ico
Notice that, as discussed above, some fields are omitted entirely because they are not defined.

#Example (similar to the 2.2.x format)
ErrorLogFormat "[%t] [%l] %7F: %E: [client\ %a] %M% ,\ referer\ %{Referer}i"
#Advanced example with request/connection log IDs

ErrorLogFormat "[%{uc}t] [%-m:%-l] [R:%L] [C:%{C}L] %7F: %E: %M"
ErrorLogFormat request "[%{uc}t] [R:%L] Request %k on C:%{c}L pid:%P tid:%T"
ErrorLogFormat request "[%{uc}t] [R:%L] UA:'%+{User-Agent}i'"
ErrorLogFormat request "[%{uc}t] [R:%L] Referer:'%+{Referer}i'"
ErrorLogFormat connection "[%{uc}t] [C:%{c}L] local\ %a remote\ %A"

