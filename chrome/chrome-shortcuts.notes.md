chrome dev tool notes

$$(selector)

$$(selector) returns an array of elements that match the given CSS selector. This command is equivalent to calling document.querySelectorAll().

The following example uses $$() to create an array of all <img> elements in the current document and displays the value of each element's src property:

    var images = $$('img');
    for (each in images) {
        console.log(images[each].src);
    }




    $x(path)

$x(path) returns an array of DOM elements that match the given XPath expression.

For example, the following returns all the <p> elements on the page:

    $x("//p")


    e following example returns all the <p> elements that contain <a> elements:

    $x("//p[a]")



clear()

clear() clears the console of its history.

    clear();
copy(object)

copy(object) copies a string representation of the specified object to the clipboard.

    copy($0);
debug(function)

When the specified function is called, the debugger is invoked and breaks inside the function on the Sources panel allowing to step through the code and debug it.

    debug(getData);

    dir(object)

dir(object) displays an object-style listing of all the specified object's properties. This method is an alias for the Console API's console.dir() method.

The following example shows the difference between evaluating document.body directly in the command line, and using dir() to display the same element:

    document.body;
    dir(document.body);



dirxml(object)

dirxml(object) prints an XML representation of the specified object, as seen in the Elements tab. This method is equivalent to the console.dirxml() method.

inspect(object/function)

inspect(object/function) opens and selects the specified element or object in the appropriate panel: either the Elements panel for DOM elements or the Profiles panel for JavaScript heap objects.

The following example opens the document.body in the Elements panel:

    inspect(document.body);




    getEventListeners(object)

getEventListeners(object) returns the event listeners registered on the specified object. The return value is an object that contains an array for each registered event type ("click" or "keydown", for example). The members of each array are objects that describe the listener registered for each type. For example, the following lists all the event listeners registered on the document object:

    getEventListeners(document);


keys(object)

keys(object) returns an array containing the names of the properties belonging to the specified object. To get the associated values of the same properties, use values().

For example, suppose your application defined the following object:

    var player1 = { "name": "Ted", "level": 42 }


    https://developers.google.com/web/tools/chrome-devtools/console/command-line-reference?utm_source=dcc&utm_medium=redirect&utm_campaign=2016q3#geteventlistenersobject