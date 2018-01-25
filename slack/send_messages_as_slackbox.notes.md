### SLACKBOT URL

`https://<team>.slack.com/services/hooks/slackbot?token=<api-token>`

- You must specify the channel you would like the message to appear in with the channel parameter.
- Send the text you would like Slackbot to say using HTTP POST. Send the text exactly as you would like it to appear as the body of your request. 
- URLs and @mentions will be automatically linked.
- You can only send up to one message per second through Slackbot. Read

```shell
curl --data "Hello from Slackbot" $'https://<team>.slack.com/services/hooks/slackbot?token=<api-token>&channel=%23general'
```

