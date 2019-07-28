

https://developer.mozilla.org/en-US/docs/Web/API/Element

# Element - Web APIs | MDN

---------------------------


**`Element`** is the most general base class from which all objects in a [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.") inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from `Element`. For example, the [`HTMLElement`](/en-US/docs/Web/API/HTMLElement "The HTMLElement interface represents any HTML element. Some elements directly implement this interface, others implement it via an interface that inherits it.") interface is the base interface for HTML elements, while the [`SVGElement`](/en-US/docs/Web/API/SVGElement "All of the SVG DOM interfaces that correspond directly to elements in the SVG language derive from the SVGElement interface.") interface is the basis for all SVG elements. Most functionality is specified further down the class hierarchy.

Languages outside the realm of the Web platform, like XUL through the `XULElement` interface, also implement `Element`.

```
<div id="interfaceDiagram" style="display: inline-block; position: relative; width: 100%; padding-bottom: 11.666666666666666%; vertical-align: middle; overflow: hidden;"><svg style="display: inline-block; position: absolute; top: 0; left: 0;" viewbox="-50 0 600 70" preserveAspectRatio="xMinYMin meet"><a xlink:href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget" target="_top"><rect x="1" y="1" width="110" height="50" fill="#fff" stroke="#D4DDE4" stroke-width="2px" /><text  x="56" y="30" font-size="12px" font-family="Consolas,Monaco,Andale Mono,monospace" fill="#4D4E53" text-anchor="middle" alignment-baseline="middle">EventTarget</text></a><polyline points="111,25  121,20  121,30  111,25" stroke="#D4DDE4" fill="none"/><line x1="121" y1="25" x2="151" y2="25" stroke="#D4DDE4"/><a xlink:href="https://developer.mozilla.org/en-US/docs/Web/API/Node" target="_top"><rect x="151" y="1" width="75" height="50" fill="#fff" stroke="#D4DDE4" stroke-width="2px" /><text  x="188.5" y="30" font-size="12px" font-family="Consolas,Monaco,Andale Mono,monospace" fill="#4D4E53" text-anchor="middle" alignment-baseline="middle">Node</text></a><polyline points="226,25  236,20  236,30  226,25" stroke="#D4DDE4" fill="none"/><line x1="236" y1="25" x2="266" y2="25" stroke="#D4DDE4"/><a xlink:href="https://developer.mozilla.org/en-US/docs/Web/API/Element" target="_top"><rect x="266" y="1" width="75" height="50" fill="#F4F7F8" stroke="#D4DDE4" stroke-width="2px" /><text  x="303.5" y="30" font-size="12px" font-family="Consolas,Monaco,Andale Mono,monospace" fill="#4D4E53" text-anchor="middle" alignment-baseline="middle">Element</text></a></svg></div>
```

```
a:hover text { fill: #0095DD; pointer-events: all;}
```

## Properties

_Inherits properties from its parent interface, [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way."), and by extension that interface's parent, [`EventTarget`](/en-US/docs/Web/API/EventTarget "EventTarget is an interface implemented by objects that can receive events and may have listeners for them."). It implements the properties of [`ParentNode`](/en-US/docs/Web/API/ParentNode "The ParentNode mixin contains methods and properties that are common to all types of Node objects that can have children. It's implemented by Element, Document, and DocumentFragment objects."), [`ChildNode`](/en-US/docs/Web/API/ChildNode "The ChildNode interface contains methods that are particular to Node objects that can have a parent."), [`NonDocumentTypeChildNode`](/en-US/docs/Web/API/NonDocumentTypeChildNode "The NonDocumentTypeChildNode interface contains methods that are particular to Node objects that can have a parent, but not suitable for DocumentType."),_ and [`Animatable`](/en-US/docs/Web/API/Animatable "The documentation about this has not yet been written; please consider contributing!").

[`Element.attributes`](/en-US/docs/Web/API/Element/attributes "The Element.attributes property returns a live collection of all attribute nodes registered to the specified node. It is a NamedNodeMap, not an Array, so it has no Array methods and the Attr nodes' indexes may differ among browsers. To be more specific, attributes is a key/value pair of strings that represents any information regarding that attribute.") Read only

Returns a [`NamedNodeMap`](/en-US/docs/Web/API/NamedNodeMap "The NamedNodeMap interface represents a collection of Attr objects. Objects inside a NamedNodeMap are not in any particular order, unlike NodeList, although they may be accessed by an index as in an array.") object containing the assigned attributes of the corresponding HTML element.

[`Element.classList`](/en-US/docs/Web/API/Element/classList "The Element.classList is a read-only property which returns a live DOMTokenList collection of the class attributes of the element.") Read only

Returns a [`DOMTokenList`](/en-US/docs/Web/API/DOMTokenList "The DOMTokenList interface represents a set of space-separated tokens. Such a set is returned by Element.classList, HTMLLinkElement.relList, HTMLAnchorElement.relList, HTMLAreaElement.relList, HTMLIframeElement.sandbox, or HTMLOutputElement.htmlFor. It is indexed beginning with 0 as with JavaScript Array objects. DOMTokenList is always case-sensitive.") containing the list of class attributes.

[`Element.className`](/en-US/docs/Web/API/Element/className "className gets and sets the value of the class attribute of the specified element.")

Is a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the class of the element.

[`Element.clientHeight`](/en-US/docs/Web/API/Element/clientHeight "The Element.clientHeight read-only property is zero for elements with no CSS or inline layout boxes, otherwise it's the inner height of an element in pixels, including padding but not the horizontal scrollbar height, border, or margin.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the inner height of the element.

[`Element.clientLeft`](/en-US/docs/Web/API/Element/clientLeft "The width of the left border of an element in pixels. It includes the width of the vertical scrollbar if the text direction of the element is right–to–left and if there is an overflow causing a left vertical scrollbar to be rendered. clientLeft does not include the left margin or the left padding. clientLeft is read-only.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the width of the left border of the element.

[`Element.clientTop`](/en-US/docs/Web/API/Element/clientTop "The width of the top border of an element in pixels. It is a read-only, integer property of element.")  Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the width of the top border of the element.

[`Element.clientWidth`](/en-US/docs/Web/API/Element/clientWidth "The Element.clientWidth property is zero for elements with no CSS or inline layout boxes, otherwise it's the inner width of an element in pixels. It includes padding but not the vertical scrollbar (if present, if rendered), border or margin.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the inner width of the element.

[`Element.computedName`](/en-US/docs/Web/API/Element/computedName "The documentation about this has not yet been written; please consider contributing!") Read only

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") containing the label exposed to accessibility.

[`Element.computedRole`](/en-US/docs/Web/API/Element/computedRole "The documentation about this has not yet been written; please consider contributing!") Read only

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") containing the ARIA role that has been applied to a particular element. 

[`Element.id`](/en-US/docs/Web/API/Element/id "The Element.id property represents the element's identifier, reflecting the id global attribute.")

Is a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the id of the element.

[`Element.innerHTML`](/en-US/docs/Web/API/Element/innerHTML "The Element.innerHTML property sets or gets the HTML syntax describing the element's descendants.")

Is a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the markup of the element's content.

[`Element.localName`](/en-US/docs/Web/API/Element/localName "The Element.localName read-only property returns the local part of the qualified name of an element.") Read only

A [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the local part of the qualified name of the element.

[`Element.namespaceURI`](/en-US/docs/Web/API/Element/namespaceURI "The Element.namespaceURI read-only property returns the namespace URI of the element, or null if the element is not in a namespace.") Read only

The namespace URI of the element, or `null` if it is no namespace.

**Note:** In Firefox 3.5 and earlier, HTML elements are in no namespace. In later versions, HTML elements are in the `[http://www.w3.org/1999/xhtml](http://www.w3.org/1999/xhtml "Linkification: http://www.w3.org/1999/xhtml")` namespace in both HTML and XML trees.

[`NonDocumentTypeChildNode.nextElementSibling`](/en-US/docs/Web/API/NonDocumentTypeChildNode/nextElementSibling "The NonDocumentTypeChildNode.nextElementSibling read-only property returns the element immediately following the specified one in its parent's children list, or null if the specified element is the last one in the list.") Read only

Is a [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element."), the element immediately following the given one in the tree, or `null` if there's no sibling node.

[`Element.outerHTML`](/en-US/docs/Web/API/Element/outerHTML "The outerHTML attribute of the element DOM interface gets the serialized HTML fragment describing the element including its descendants. It can be set to replace the element with nodes parsed from the given string.")

Is a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the markup of the element including its content. When used as a setter, replaces the element with nodes parsed from the given string.

[`Element.prefix`](/en-US/docs/Web/API/Element/prefix "The Element.prefix read-only property returns the namespace prefix of the specified element, or null if no prefix is specified.") Read only

A [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the namespace prefix of the element, or `null` if no prefix is specified.

[`NonDocumentTypeChildNode.previousElementSibling`](/en-US/docs/Web/API/NonDocumentTypeChildNode/previousElementSibling "The NonDocumentTypeChildNode.previousElementSibling read-only property returns the Element immediately prior to the specified one in its parent's children list, or null if the specified element is the first one in the list.") Read only

Is a [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element."), the element immediately preceding the given one in the tree, or `null` if there is no sibling element.

[`Element.scrollHeight`](/en-US/docs/Web/API/Element/scrollHeight "The Element.scrollHeight read-only property is a measurement of the height of an element's content, including content not visible on the screen due to overflow.")  Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the scroll view height of an element.

[`Element.scrollLeft`](/en-US/docs/Web/API/Element/scrollLeft "The Element.scrollLeft property gets or sets the number of pixels that an element's content is scrolled to the left.")

Is a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the left scroll offset of the element.

[`Element.scrollLeftMax`](/en-US/docs/Web/API/Element/scrollLeftMax "The Element.scrollLeftMax read-only property returns a Number representing the maximum left scroll offset possible for the element.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the maximum left scroll offset possible for the element.

[`Element.scrollTop`](/en-US/docs/Web/API/Element/scrollTop "The Element.scrollTop property gets or sets the number of pixels that an element's content is scrolled vertically. ")

Is a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the top scroll offset the element.

[`Element.scrollTopMax`](/en-US/docs/Web/API/Element/scrollTopMax "The Element.scrollTopMax read-only property returns a Number representing the maximum top scroll offset possible for the element.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the maximum top scroll offset possible for the element.

[`Element.scrollWidth`](/en-US/docs/Web/API/Element/scrollWidth "The Element.scrollWidth read-only property is a measurement of the width of an element's content, including content not visible on the screen due to overflow.") Read only

Returns a [`Number`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number "The Number JavaScript object is a wrapper object allowing you to work with numerical values. A Number object is created using the Number() constructor.") representing the scroll view width of the element.

[`Element.shadowRoot`](/en-US/docs/Web/API/Element/shadowRoot "A ShadowRoot object instance, or null if the associated shadow root was attached with its mode set to closed (see Element.attachShadow for further details).") Read only

Returns the youngest shadow root that is hosted by the element.

[`Element.slot`](/en-US/docs/Web/API/Element/slot "The slot property of the Element interface returns the name of the shadow DOM slot the element is inserted in.")

Returns the name of the shadow DOM slot the element is inserted in.

[`Element.tabStop`](/en-US/docs/Web/API/Element/tabStop "The tabStop property of the Element interface returns a Boolean indicating if the element can receive input focus via the tab key. If the specified element is a shadow host tab navigation is delegated to its children.")

Is a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element can receive input focus via the tab key.

[`Element.tagName`](/en-US/docs/Web/API/Element/tagName "Returns the tag name of the element on which it's called.") Read only

Returns a [`String`](/en-US/docs/Web/API/String "The documentation about this has not yet been written; please consider contributing!") with the name of the tag for the given element.

[`Element.undoManager`](/en-US/docs/Web/API/Element/undoManager "The documentation about this has not yet been written; please consider contributing!") Read only

Returns the [`UndoManager`](/en-US/docs/Web/API/UndoManager "The documentation about this has not yet been written; please consider contributing!") associated with the element.

[`Element.undoScope`](/en-US/docs/Web/API/Element/undoScope "The documentation about this has not yet been written; please consider contributing!")

Is a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element is an undo scope host, or not.

**Note:** DOM Level 3 defined `namespaceURI`, `localName` and `prefix` on the [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") interface. In DOM4 they were moved to `Element`.

This change is implemented in Chrome since version 46.0 and Firefox since version 48.0.

### Properties included from Slotable

_The `Element` interface includes the following property, defined on the [`Slotable`](/en-US/docs/Web/API/Slotable "The Slotable mixin defines features that allow nodes to become the contents of a <slot> element — the following features are included in both Element and Text.") mixin._

[`Slotable.assignedSlot`](/en-US/docs/Web/API/Slotable/assignedSlot "The assignedSlot read-only property of the Slotable interface returns an HTMLSlotElement representing the <slot> element the node is inserted in.") Read only

Returns a [`HTMLSlotElement`](/en-US/docs/Web/API/HTMLSlotElement "The HTMLSlotElement interface of the Shadow DOM API enables access to the name and assigned nodes of an HTML <slot> element.") representing the [`<slot>`](/en-US/docs/Web/HTML/Element/slot "The HTML <slot> element—part of the Web Components technology suite—is a placeholder inside a web component that you can fill with your own markup, which lets you create separate DOM trees and present them together.") the node is inserted in.

### Event handlers

[`Element.ongotpointercapture`](/en-US/docs/Web/API/Element/ongotpointercapture "ongotpointercapture is an EventHandler property of the Element interface that returns the event handler (function) for the gotpointercapture event type.")

Returns the event handler for the `[gotpointercapture](/en-US/docs/Web/Events/gotpointercapture "/en-US/docs/Web/Events/gotpointercapture")` event type.

[`Element.onlostpointercapture`](/en-US/docs/Web/API/Element/onlostpointercapture "onlostpointercapture is an EventHandler property of the Element interface that returns the event handler (function) for the lostpointercapture event type.")

Returns the event handler for the `[lostpointercapture](/en-US/docs/Web/Events/lostpointercapture "/en-US/docs/Web/Events/lostpointercapture")` event type.

#### Obsolete event handlers

[`Element.onwheel`](/en-US/docs/Web/API/Element/onwheel "The documentation about this has not yet been written; please consider contributing!")

Returns the event handling code for the `[wheel](https://developer.mozilla.org/en-US/docs/DOM/DOM_event_reference/wheel)` event. **This is now implemented on [`GlobalEventHandlers`](/en-US/docs/Web/API/GlobalEventHandlers/onwheel "The onwheel property returns the onwheel event handler code on the current element.").**

## Methods

_Inherits methods from its parents [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way."), and its own parent, [`EventTarget`](/en-US/docs/Web/API/EventTarget "EventTarget is an interface implemented by objects that can receive events and may have listeners for them.")_, and implements those of [`ParentNode`](/en-US/docs/Web/API/ParentNode "The ParentNode mixin contains methods and properties that are common to all types of Node objects that can have children. It's implemented by Element, Document, and DocumentFragment objects."), [`ChildNode`](/en-US/docs/Web/API/ChildNode "The ChildNode interface contains methods that are particular to Node objects that can have a parent.")_, [`NonDocumentTypeChildNode`](/en-US/docs/Web/API/NonDocumentTypeChildNode "The NonDocumentTypeChildNode interface contains methods that are particular to Node objects that can have a parent, but not suitable for DocumentType."),__ and [`Animatable`](/en-US/docs/Web/API/Animatable "The documentation about this has not yet been written; please consider contributing!")._

[`EventTarget.addEventListener()`](/en-US/docs/Web/API/EventTarget/addEventListener "The EventTarget.addEventListener() method adds the specified EventListener-compatible object to the list of event listeners for the specified event type on the EventTarget on which it is called. The event target may be an Element in a document, the Document itself, a Window, or any other object that supports events (such as XMLHttpRequest).")

Registers an event handler to a specific event type on the element.

[`Element.attachShadow()`](/en-US/docs/Web/API/Element/attachShadow "The Element.attachShadow() method attaches a shadow DOM tree to the specified element and returns a reference to its ShadowRoot.")

Attatches a shadow DOM tree to the specified element and returns a reference to its [`ShadowRoot`](/en-US/docs/Web/API/ShadowRoot "The ShadowRoot interface of the Shadow DOM API is the root node of a DOM subtree that is rendered separately from a document's main DOM tree.").

[`Element.animate()`](/en-US/docs/Web/API/Element/animate "The Element interface's animate() method is a shortcut method which creates a new Animation, applies it to the element, then plays the animation. It returns the created Animation object instance.")

A shortcut method to create and run an animation on an element. Returns the created Animation object instance.

[`Element.closest()`](/en-US/docs/Web/API/Element/closest "For browsers that do not support Element.closest(), but carry support for element.matches() (or a prefixed equivalent, meaning IE9+), a polyfill exists:")

Returns the [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element.") which is the closest ancestor of the current element (or the current element itself) which matches the selectors given in parameter.

[`Element.createShadowRoot()`](/en-US/docs/Web/API/Element/createShadowRoot "Use Element.createShadowRoot to create an instance of shadow DOM. When shadow DOM is created, it is always attached to an existing element. After the shadow DOM is created, the element that it is attached to is called the shadow root.")  

Creates a [shadow DOM](/en-US/docs/Web/Web_Components/Shadow_DOM) on on the element, turning it into a shadow host. Returns a [`ShadowRoot`](/en-US/docs/Web/API/ShadowRoot "The ShadowRoot interface of the Shadow DOM API is the root node of a DOM subtree that is rendered separately from a document's main DOM tree.").

[`EventTarget.dispatchEvent()`](/en-US/docs/Web/API/EventTarget/dispatchEvent "Dispatches an Event at the specified EventTarget, invoking the affected EventListeners in the appropriate order. The normal event processing rules (including the capturing and optional bubbling phase) also apply to events dispatched manually with dispatchEvent().")

Dispatches an event to this node in the DOM and returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") that indicates whether no handler canceled the event.

[`Element.getAnimations()`](/en-US/docs/Web/API/Element/getAnimations "The documentation about this has not yet been written; please consider contributing!")

Returns an array of Animation objects currently active on the element.

[`Element.getAttribute()`](/en-US/docs/Web/API/Element/getAttribute "getAttribute() returns the value of a specified attribute on the element.")

Retrieves the value of the named attribute from the current node and returns it as an [`Object`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object "The Object constructor creates an object wrapper.").

[`Element.getAttributeNames()`](/en-US/docs/Web/API/Element/getAttributeNames "Element.getAttributeNames() returns the attribute names of the element as an Array of strings.")

Returns an array of attribute names from the current element.

[`Element.getAttributeNS()`](/en-US/docs/Web/API/Element/getAttributeNS "getAttributeNS returns the string value of the attribute with the specified namespace and name. If the named attribute does not exist, the value returned will either be null or "" (the empty string); see Notes for details.")

Retrieves the value of the attribute with the specified name and namespace, from the current node and returns it as an [`Object`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object "The Object constructor creates an object wrapper.").

[`Element.getAttributeNode()`](/en-US/docs/Web/API/Element/getAttributeNode "Returns the specified attribute of the specified element, as an Attr node.")

Retrieves the node representation of the named attribute from the current node and returns it as an [`Attr`](/en-US/docs/Web/API/Attr "This type represents a DOM element's attribute as an object. In most DOM methods, you will probably directly retrieve the attribute as a string (e.g., Element.getAttribute(), but certain functions (e.g., Element.getAttributeNode()) or means of iterating give Attr types.").

[`Element.getAttributeNodeNS()`](/en-US/docs/Web/API/Element/getAttributeNodeNS "Returns the Attr node for the attribute with the given namespace and name.")

Retrieves the node representation of the attribute with the specified name and namespace, from the current node and returns it as an [`Attr`](/en-US/docs/Web/API/Attr "This type represents a DOM element's attribute as an object. In most DOM methods, you will probably directly retrieve the attribute as a string (e.g., Element.getAttribute(), but certain functions (e.g., Element.getAttributeNode()) or means of iterating give Attr types.").

[`Element.getBoundingClientRect()`](/en-US/docs/Web/API/Element/getBoundingClientRect "The Element.getBoundingClientRect() method returns the size of an element and its position relative to the viewport.")

Returns the size of an element and its position relative to the viewport.

[`Element.getClientRects()`](/en-US/docs/Web/API/Element/getClientRects "The Element.getClientRects() method returns a collection of DOMRect objects that indicate the bounding rectangles for each CSS border box in a client.")

Returns a collection of rectangles that indicate the bounding rectangles for each line of text in a client.

[`Element.getElementsByClassName()`](/en-US/docs/Web/API/Element/getElementsByClassName "The Element method getElementsByClassName() returns a live HTMLCollection which contains every descendant element which has the specified class name or names.")

Returns a live [`HTMLCollection`](/en-US/docs/Web/API/HTMLCollection "The HTMLCollection interface represents a generic collection (array-like object similar to arguments) of elements (in document order) and offers methods and properties for selecting from the list.") that contains all descendants of the current element that possess the list of classes given in the parameter.

[`Element.getElementsByTagName()`](/en-US/docs/Web/API/Element/getElementsByTagName "The Element.getElementsByTagName() method returns a live HTMLCollection of elements with the given tag name. The subtree underneath the specified element is searched, excluding the element itself. The returned list is live, meaning that it updates itself with the DOM tree automatically. Consequently, there is no need to call several times Element.getElementsByTagName() with the same element and arguments.")

Returns a live [`HTMLCollection`](/en-US/docs/Web/API/HTMLCollection "The HTMLCollection interface represents a generic collection (array-like object similar to arguments) of elements (in document order) and offers methods and properties for selecting from the list.") containing all descendant elements, of a particular tag name, from the current element.

[`Element.getElementsByTagNameNS()`](/en-US/docs/Web/API/Element/getElementsByTagNameNS "The Element.getElementsByTagNameNS() method returns a live HTMLCollection of elements with the given tag name belonging to the given namespace. It is similar to Document.getElementsByTagNameNS, except that its search is restricted to descendants of the specified element.")

Returns a live [`HTMLCollection`](/en-US/docs/Web/API/HTMLCollection "The HTMLCollection interface represents a generic collection (array-like object similar to arguments) of elements (in document order) and offers methods and properties for selecting from the list.") containing all descendant elements, of a particular tag name and namespace, from the current element.

[`Element.hasAttribute()`](/en-US/docs/Web/API/Element/hasAttribute "The Element.hasAttribute() method returns a Boolean value indicating whether the specified element has the specified attribute or not.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element has the specified attribute or not.

[`Element.hasAttributeNS()`](/en-US/docs/Web/API/Element/hasAttributeNS "hasAttributeNS returns a boolean value indicating whether the current element has the specified attribute.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element has the specified attribute, in the specified namespace, or not.

[`Element.hasAttributes()`](/en-US/docs/Web/API/Element/hasAttributes "The Element.hasAttributes() method returns Boolean value, indicating if the current element has any attributes or not.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element has one or more HTML attributes present.

[`Element.insertAdjacentElement`](/en-US/docs/Web/API/Element/insertAdjacentElement "The insertAdjacentElement() method inserts a given element node at a given position relative to the element it is invoked upon.")

Inserts a given element node at a given position relative to the element it is invoked upon.

[`Element.insertAdjacentHTML`](/en-US/docs/Web/API/Element/insertAdjacentHTML "insertAdjacentHTML() parses the specified text as HTML or XML and inserts the resulting nodes into the DOM tree at a specified position. It does not reparse the element it is being used on and thus it does not corrupt the existing elements inside that element. This avoids the extra step of serialization, making it much faster than direct innerHTML manipulation.")

Parses the text as HTML or XML and inserts the resulting nodes into the tree in the position given.

[`Element.insertAdjacentText`](/en-US/docs/Web/API/Element/insertAdjacentText "The insertAdjacentText() method inserts a given text node at a given position relative to the element it is invoked upon.")

Inserts a given text node at a given position relative to the element it is invoked upon.

[`Element.matches()`](/en-US/docs/Web/API/Element/matches "The Element.matches() method returns true if the element would be selected by the specified selector string; otherwise, returns false.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating whether or not the element would be selected by the specified selector string.

[`Element.querySelector()`](/en-US/docs/Web/API/Element/querySelector "Returns the first element that is a descendant of the element on which it is invoked that matches the specified group of selectors.")

Returns the first [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") which matches the specified selector string relative to the element.

[`Element.querySelectorAll()`](/en-US/docs/Web/API/Element/querySelectorAll "Returns a static (not live) NodeList of all elements descended from the element on which it is invoked that matches the specified group of CSS selectors. (The base element itself is not included, even if it matches.)")

Returns a [`NodeList`](/en-US/docs/Web/API/NodeList "NodeList objects are collections of nodes such as those returned by properties such as Node.childNodes and the document.querySelectorAll() method.") of nodes which match the specified selector string relative to the element.

[`Element.releasePointerCapture()`](/en-US/docs/Web/API/Element/releasePointerCapture "Releases (stops) pointer capture that was previously set for a specific (PointerEvent) pointer.")

Releases (stops) pointer capture that was previously set for a specific [`pointer event`](/en-US/docs/Web/API/PointerEvent "The PointerEvent interface represents the state of a DOM event produced by a pointer such as the geometry of the contact point, the device type that generated the event, the amount of pressure that was applied on the contact surface, etc.").

[`ChildNode.remove()`](/en-US/docs/Web/API/ChildNode/remove "The ChildNode.remove() method removes the object from the tree it belongs to.")

Removes the element from the children list of its parent.

[`Element.removeAttribute()`](/en-US/docs/Web/API/Element/removeAttribute "removeAttribute removes an attribute from the specified element.")

Removes the named attribute from the current node.

[`Element.removeAttributeNS()`](/en-US/docs/Web/API/Element/removeAttributeNS "removeAttributeNS removes the specified attribute from an element.")

Removes the attribute with the specified name and namespace, from the current node.

[`Element.removeAttributeNode()`](/en-US/docs/Web/API/Element/removeAttributeNode "removeAttributeNode removes the specified attribute from the current element.")

Removes the node representation of the named attribute from the current node.

[`EventTarget.removeEventListener()`](/en-US/docs/Web/API/EventTarget/removeEventListener "The EventTarget.removeEventListener() method removes from the EventTarget an event listener previously registered with EventTarget.addEventListener(). The event listener to be removed is identified using a combination of the event type, the event listener function itself, and various optional options that may affect the matching process; see Matching event listeners for removal")

Removes an event listener from the element.

[`Element.requestFullscreen()`](/en-US/docs/Web/API/Element/requestFullscreen "The Element.requestFullscreen() method issues an asynchronous request to make the element be displayed full-screen.")

Asynchronously asks the browser to make the element full-screen.

[`Element.requestPointerLock()`](/en-US/docs/Web/API/Element/requestPointerLock "The Element.requestPointerLock() method allows to asynchronously ask for the pointer to be locked on the given element.")

Allows to asynchronously ask for the pointer to be locked on the given element.

[`Element.scrollIntoView()`](/en-US/docs/Web/API/Element/scrollIntoView "The Element.scrollIntoView() method scrolls the element on which it's called into the visible area of the browser window.") 

Scrolls the page until the element gets into the view.

[`Element.setAttribute()`](/en-US/docs/Web/API/Element/setAttribute "Sets the value of an attribute on the specified element. If the attribute already exists, the value is updated; otherwise a new attribute is added with the specified name and value.")

Sets the value of a named attribute of the current node.

[`Element.setAttributeNS()`](/en-US/docs/Web/API/Element/setAttributeNS "setAttributeNS adds a new attribute or changes the value of an attribute with the given namespace and name.")

Sets the value of the attribute with the specified name and namespace, from the current node.

[`Element.setAttributeNode()`](/en-US/docs/Web/API/Element/setAttributeNode "setAttributeNode() adds a new Attr node to the specified element.")

Sets the node representation of the named attribute from the current node.

[`Element.setAttributeNodeNS()`](/en-US/docs/Web/API/Element/setAttributeNodeNS "setAttributeNodeNS adds a new namespaced attribute node to an element.")

Setw the node representation of the attribute with the specified name and namespace, from the current node.

[`Element.setCapture()`](/en-US/docs/Web/API/Element/setCapture "Call this method during the handling of a mousedown event to retarget all mouse events to this element until the mouse button is released or document.releaseCapture() is called.")

Sets up mouse event capture, redirecting all mouse events to this element.

[`Element.setPointerCapture()`](/en-US/docs/Web/API/Element/setPointerCapture "Pointer capture allows events for a particular pointer event (PointerEvent) to be re-targeted to a particular element instead of the normal target (or hit test) at a pointer's location. This can be used to ensure that an element continues to receive pointer events even if the pointer device's contact moves off the element (for example by scrolling).")

Designates a specific element as the capture target of future [pointer events](/en-US/docs/Web/API/Pointer_events).

## Specifications

| Specification                                                | Status        | Comment                             |
| ------------------------------------------------------------ | ------------- | ----------------------------------- |
| [Web Animations](https://drafts.csswg.org/web-animations/ "The 'Web Animations' specification") | Working Draft | Added the `getAnimations()` method. |
| [UndoManager and DOMTransaction  
The definition of 'Element' in that specification.](https://dvcs.w3.org/hg/undomanager/raw-file/tip/undomanager.html) | Editor's Draft | Added the `undoScope` and `undoManager` properties. |
| [Pointer Events – Level 2  
The definition of 'Element' in that specification.](https://w3c.github.io/pointerevents/#extensions-to-the-element-interface) | Working Draft | Added the following event handlers: `ongotpointercapture` and `onlostpointercapture`.  
Added the following methods: `setPointerCapture()` and `releasePointerCapture()`. |
| [Pointer Events  
The definition of 'Element' in that specification.](https://www.w3.org/TR/pointerevents/#extensions-to-the-element-interface) | Recommendation | Added the following event handlers: `ongotpointercapture` and `onlostpointercapture`.  
Added the following methods: `setPointerCapture()` and `releasePointerCapture()`. |
| [Selectors API Level 1  
The definition of 'Element' in that specification.](https://www.w3.org/TR/selectors-api/#interface-definitions) | Obsolete | Added the following methods: `querySelector()` and `querySelectorAll()`. |
| [Pointer Lock  
The definition of 'Element' in that specification.](https://w3c.github.io/pointerlock/index.html#element-interface) | Candidate Recommendation | Added the `requestPointerLock()` method. |
| [Fullscreen API  
The definition of 'Element' in that specification.](https://fullscreen.spec.whatwg.org/#api) | Living Standard | Added the `requestFullscreen()` method. |
| [DOM Parsing and Serialization  
The definition of 'Element' in that specification.](https://w3c.github.io/DOM-Parsing/#extensions-to-the-element-interface) | Working Draft | Added the following properties: `innerHTML`, and `outerHTML`.  
Added the following method: `insertAdjacentHTML()`. |
| [CSS Object Model (CSSOM) View Module  
The definition of 'Element' in that specification.](https://drafts.csswg.org/cssom-view/#extensions-to-the-element-interface) | Working Draft | Added the following properties: `scrollTop`, `scrollLeft`, `scrollWidth`, `scrollHeight`, `clientTop`, `clientLeft`, `clientWidth`, and `clientHeight`.  
Added the following methods: `getClientRects()`, `getBoundingClientRect()`, and `scrollIntoView()`. |
| [Element Traversal Specification  
The definition of 'Element' in that specification.](https://www.w3.org/TR/ElementTraversal/#ecmascript-bindings) | Obsolete | Added inheritance of the [`ElementTraversal`](/en-US/docs/Web/API/ElementTraversal "The ElementTraversal interface was defining methods allowing to access from one Node to another one in the document tree.") interface. |
| [DOM  
The definition of 'Element' in that specification.](https://dom.spec.whatwg.org/#interface-element) | Living Standard | Removed the following methods: `closest()`, `setIdAttribute()`, `setIdAttributeNS()`, and `setIdAttributeNode()`.  
Removed the `schemaTypeInfo` property.  
Modified the return value of `getElementsByTag()` and `getElementsByTagNS()`.  
Moved `hasAttributes()` from the `Node` interface to this one.  
Inserted `insertAdjacentElement()` and `insertAdjacentText()`. |
| [Document Object Model (DOM) Level 3 Core Specification  
The definition of 'Element' in that specification.](https://www.w3.org/TR/DOM-Level-3-Core/core.html#ID-745549614) | Obsolete | Added the following methods: `setIdAttribute()`, `setIdAttributeNS()`, and `setIdAttributeNode()`. These methods were never implemented and have been removed in later specifications.  
Added the `schemaTypeInfo` property. This property was never implemented and has been removed in later specifications. |
| [Document Object Model (DOM) Level 2 Core Specification  
The definition of 'Element' in that specification.](https://www.w3.org/TR/DOM-Level-2-Core/core.html#ID-745549614) | Obsolete | The `normalize()` method has been moved to [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way."). |
| [Document Object Model (DOM) Level 1 Specification  
The definition of 'Element' in that specification.](https://www.w3.org/TR/REC-DOM-Level-1/level-one-core.html#ID-745549614) | Obsolete | Initial definition. |

## Browser compatibility

**[We're converting our compatibility data into a machine-readable JSON format](https://github.com/mdn/browser-compat-data)**. This compatibility table still uses the old format, because we haven't yet converted the data it contains. **[Find out how you can help!](/en-US/docs/MDN/Contribute/Structures/Compatibility_tables)**

*   Desktop
*   Mobile

| Feature       | Chrome | Edge  | Firefox (Gecko)      | Internet Explorer | Opera | Safari (WebKit) |
| ------------- | ------ | ----- | -------------------- | ----------------- | ----- | --------------- |
| Basic support | 1.0    | (Yes) | 1.0 (1.7 or earlier) | (Yes)             | (Yes) | 1.0             |
| `children` | (Yes) | (Yes) | [3.0](/en-US/Firefox/Releases/3 "Released on 2008-06-17.") (1.9) | 7.0 with a significant bug \[1\]  
9.0 according to the spec | (Yes) | No support |
| `childElementCount`, `nextElementSibling`, `previousElementSibling` | (Yes) | (Yes) | [3.5](/en-US/Firefox/Releases/3.5 "Released on 2009-06-30.") (1.9.1) | 9.0 | (Yes) | (Yes) |
| `firstElementChild`, `lastElementChild` | (Yes) | (Yes) | [3.0](/en-US/Firefox/Releases/3 "Released on 2008-06-17.") (1.9) | 9.0 | (Yes) | (Yes) |
| `classList` | (Yes) | (Yes) | [3.6](/en-US/Firefox/Releases/3.6 "Released on 2010-01-21.") (1.9.2) |   | (Yes) | (Yes) |
| `outerHTML` | (Yes) | (Yes) | [11](/en-US/Firefox/Releases/11 "Released on 2012-03-13.") (11) | (Yes) | (Yes) | (Yes) |
| `clientLeft`, `clientTop` | (Yes) | (Yes) | [3.5](/en-US/Firefox/Releases/3.5 "Released on 2009-06-30.") (1.9.1) | (Yes) | (Yes) | (Yes) |
| `getBoundingClientRect()`, `getClientRects()` | (Yes) | (Yes) | [3.0](/en-US/Firefox/Releases/3 "Released on 2008-06-17.") (1.9) | (Yes) | (Yes) | (Yes) |
| `querySelector()`, `querySelectorAll()` | 1.0 | (Yes) | [3.5](/en-US/Firefox/Releases/3.5 "Released on 2009-06-30.") (1.9.1) | 8.0 | 10.0 | 3.2 (525.3) |
| `insertAdjacentHTML()` | 1.0 | (Yes) | [8](/en-US/Firefox/Releases/8 "Released on 2011-11-08.") (8) | 4.0 | 7.0 | 4.0 (527) |
| `setCapture()` | No support | No support | [4.0](/en-US/Firefox/Releases/4 "Released on 2011-03-22.") (2) | No support | No support | No support |
| `oncopy`, `oncut`, `onpaste` | No support | No support | [3.0](/en-US/Firefox/Releases/3 "Released on 2008-06-17.") (1.9) | (Yes) |   | No support |
| `onwheel` | No support | (Yes) | [17](/en-US/Firefox/Releases/17 "Released on 2012-11-20.") (17) | No support | No support | No support |
| `ongotpointercapture`, `onlostpointercapture`, `setPointerCapture()`, and `releasePointerCapture()` | 52.0 \[4\] | (Yes) | (Yes) \[3\] | 10.0 | No support | No support |
| `matches()` | (Yes) with the non-standard name `webkitMatchesSelector` | (Yes) [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental") [ms](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'ms' as this browser considers it experimental") | [3.6](/en-US/Firefox/Releases/3.6 "Released on 2010-01-21.") (1.9.2) with the non-standard name `mozMatchesSelector`  
[34](/en-US/Firefox/Releases/34 "Released on 2014-12-01.") (34) with the standard name | 9.0 with the non-standard name `msMatchesSelector` | 11.5 with the non-standard name `oMatchesSelector`  
15.0 with the non-standard name `webkitMatchesSelector` | 5.0 with the non-standard name `webkitMatchesSelector` |
| `requestPointerLock()` | 16.0 [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental"), behind an about:flags  
22.0 [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental") (with special cases, progressively lifted see \[2\]) | (Yes) | [14](/en-US/Firefox/Releases/14 "Released on 2012-07-17.") (14)[moz](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'moz' as this browser considers it experimental") | No support | No support | No support |
| `requestFullscreen()` | 14.0 [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental") | (Yes) | [10](/en-US/Firefox/Releases/10 "Released on 2012-01-31.") (10) [moz](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'moz' as this browser considers it experimental") | 11.0 [ms](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'ms' as this browser considers it experimental") | 12.10  
15.0 [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental") | 5.1 [webkit](/en-US/docs/Web/Guide/Prefixes "The name of this feature is prefixed with 'webkit' as this browser considers it experimental") |
| `undoManager` and `undoScope` | No support | No support | (Yes) (behind the `dom.undo_manager.enabled` pref) | No support | No support | No support |
| `attributes` | ? | No support | [22](/en-US/Firefox/Releases/22 "Released on 2013-06-25.") (22)  
Before this it was available via the [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") interface that any `element` inherits. | ? | ? | ? |
| `scrollTopMax()` and `scrollLeftMax() ` | No support | No support | [16](/en-US/Firefox/Releases/16 "Released on 2012-10-09.") (16) | No support | No support | No support |
| `closest()` | ? | (Yes) | [35](/en-US/Firefox/Releases/35 "Released on 2015-01-13.") (35) | ? | ? | ? |
| `hasAttributes()` | (Yes) | No support | 1.0 (1.7 or earlier) (on the [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") interface)  
[35](/en-US/Firefox/Releases/35 "Released on 2015-01-13.") (35) (on this interface | (Yes) | (Yes) | (Yes) |
| `insertAdjacentElement()`, `insertAdjacentText()` | (Yes) | No support | [48.0](/en-US/Firefox/Releases/48 "Released on 2016-08-02.") (48.0) | ? | (Yes) | (Yes) |
| `assignedSlot`, `attatchShadow`, `shadowRoot`, and `slot` | 53 | No support | ? | ? | ? | ? |
| `computedRole` and `computedName` | 41\[4\] | ? | ? | ? | 28\[4\] | ? |

| Feature                                 | Android    | Android Webview | Edge       | Firefox Mobile (Gecko) | IE Phone   | Opera Mobile | Safari Mobile | Chrome for Android |
| --------------------------------------- | ---------- | --------------- | ---------- | ---------------------- | ---------- | ------------ | ------------- | ------------------ |
| Basic support                           | 1.0        |                 | (Yes)      | 1.0 (1)                | (Yes)      | (Yes)        | 1.0           |                    |
| `scrollTopMax()` and `scrollLeftMax() ` | No support |                 | No support | 16.0 (16)              | No support | No support   | No support    |                    |
| `closest()`                             | ?          |                 | (Yes)      | 35.0 (35)              | ?          | ?            | ?             |                    |
| `hasAttributes()` | (Yes) |   | No support | 1.0 (1.0) (on the [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") interface)  
35.0 (35) (on this interface | (Yes) | (Yes) | (Yes) |   |
| `insertAdjacentElement()`, `insertAdjacentText()` | (Yes) |   | (Yes) | 48.0 (48.0) | ? | (Yes) | (Yes) |   |
| `assignedSlot`, `attatchShadow`, `shadowRoot`, and `slot` | No support | 53.0 | No support | ? | ? | ? | ? | 53 |
| `computedRole` and `computedName` | No support | No support | ? | ? | ? | 28\[4\] | ? | No support |

\[1\] Internet Explorer 7 and 8 incorrectly return the comments as part of the children of an Element. This is fixed in Internet Explorer 9 and later.

\[2\] Chrome 16 allowed `webkitRequestPointerLock()` only in fullscreen; Chrome 21 for trusted web site (permission asked); Chrome 22 allowed it by default for all same-origin document; Chrome 23 allowed it in sandboxed [`<iframe>`](/en-US/docs/Web/HTML/Element/iframe "The HTML <iframe> element represents a nested browsing context, effectively embedding another HTML page into the current page. In HTML 4.01, a document may contain a head and a body or a head and a frameset, but not both a body and a frameset. However, an <iframe> can be used within a normal document body. Each browsing context has its own session history and active document. The browsing context that contains the embedded content is called the parent browsing context. The top-level browsing context (which has no parent) is typically the browser window.") if the non-standard value `webkit-allow-pointer-lock` is set to the `[sandbox](/en-US/docs/Web/HTML/Element/iframe#attr-sandbox)` attribute.

\[3\] Implementation withdrawn. See [bug 1166347](https://bugzilla.mozilla.org/show_bug.cgi?id=1166347 "Enabling pointer events in Nightly builds").

\[4\] Behind a flag.

## Document Tags and Contributors

**Tags:** 

*   [API](/en-US/docs/tag/API)
*   [DOM](/en-US/docs/tag/DOM)
*   [DOM Reference](/en-US/docs/tag/DOM%20Reference)
*   [Element](/en-US/docs/tag/Element)
*   [Interface](/en-US/docs/tag/Interface)
*   [Reference](/en-US/docs/tag/Reference)
*   [Web API](/en-US/docs/tag/Web%20API)

 **Contributors to this page:** [chrisdavidmills](/en-US/profiles/chrisdavidmills), [tshinnic](/en-US/profiles/tshinnic), [sarah-maris](/en-US/profiles/sarah-maris), [destin.moulton](/en-US/profiles/destin.moulton), [axelf4](/en-US/profiles/axelf4), [Sheppy](/en-US/profiles/Sheppy), [fvsch](/en-US/profiles/fvsch), [CameronRoberts](/en-US/profiles/CameronRoberts), [DomenicDenicola](/en-US/profiles/DomenicDenicola), [inquirer5](/en-US/profiles/inquirer5), [adria](/en-US/profiles/adria), [isomorphismes](/en-US/profiles/isomorphismes), [21042jim](/en-US/profiles/21042jim), [trusktr](/en-US/profiles/trusktr), [jpmedley](/en-US/profiles/jpmedley), [arronei](/en-US/profiles/arronei), [kashilling](/en-US/profiles/kashilling), [erikadoyle](/en-US/profiles/erikadoyle), [montrealist](/en-US/profiles/montrealist), [shtarbanov](/en-US/profiles/shtarbanov), [whinc](/en-US/profiles/whinc), [Sebastianz](/en-US/profiles/Sebastianz), [RavuAlHemio](/en-US/profiles/RavuAlHemio), [cvrebert](/en-US/profiles/cvrebert), [rachelnabors](/en-US/profiles/rachelnabors), [LouisLazaris](/en-US/profiles/LouisLazaris), [AFBarstow](/en-US/profiles/AFBarstow), [m-a-r-c-e-l-i-n-o](/en-US/profiles/m-a-r-c-e-l-i-n-o), [arhoads](/en-US/profiles/arhoads), [stuart](/en-US/profiles/stuart), [Mylainos](/en-US/profiles/Mylainos), [birtles](/en-US/profiles/birtles), [matt.titchener](/en-US/profiles/matt.titchener), [markg](/en-US/profiles/markg), [Ampersandy](/en-US/profiles/Ampersandy), [fscholz](/en-US/profiles/fscholz), [teoli](/en-US/profiles/teoli), [Pluto](/en-US/profiles/Pluto), [ziyunfei](/en-US/profiles/ziyunfei), [Tomasz_Kolodziejski](/en-US/profiles/Tomasz_Kolodziejski), [dotnetCarpenter](/en-US/profiles/dotnetCarpenter), [Delapouite](/en-US/profiles/Delapouite), [starrow](/en-US/profiles/starrow), [nairakhil13](/en-US/profiles/nairakhil13), [Techsin](/en-US/profiles/Techsin), [Nickolay](/en-US/profiles/Nickolay), [Masayuki](/en-US/profiles/Masayuki), [Marcoos](/en-US/profiles/Marcoos), [Markus Prokott](/en-US/profiles/Markus%20Prokott), [trevorh](/en-US/profiles/trevorh), [Hipokrit](/en-US/profiles/Hipokrit), [Hsivonen](/en-US/profiles/Hsivonen), [Crash](/en-US/profiles/Crash), [Taken](/en-US/profiles/Taken), [Niczar](/en-US/profiles/Niczar), [Brettz9](/en-US/profiles/Brettz9), [Jürgen Jeka](/en-US/profiles/J%C3%BCrgen%20Jeka), [Djc8080](/en-US/profiles/Djc8080), [RodMcGuire](/en-US/profiles/RodMcGuire), [Jay I.](/en-US/profiles/Jay%20I.), [Potappo](/en-US/profiles/Potappo), [BijuGC](/en-US/profiles/BijuGC), [George3](/en-US/profiles/George3), [CN](/en-US/profiles/CN), [pusanbear](/en-US/profiles/pusanbear), [MarkFinkle](/en-US/profiles/MarkFinkle), [BenoitL](/en-US/profiles/BenoitL), [Mckoss](/en-US/profiles/Mckoss), [Codigo13](/en-US/profiles/Codigo13), [TomC](/en-US/profiles/TomC), [GT](/en-US/profiles/GT), [Mgjbot](/en-US/profiles/Mgjbot), [Jresig](/en-US/profiles/Jresig), [Andreas Wuest](/en-US/profiles/Andreas%20Wuest), [Tmetro](/en-US/profiles/Tmetro), [Dewang](/en-US/profiles/Dewang), [Jabez](/en-US/profiles/Jabez), [Takenbot](/en-US/profiles/Takenbot), [RobG](/en-US/profiles/RobG), [Ptak82](/en-US/profiles/Ptak82), [DBaron](/en-US/profiles/DBaron), [Fguisset](/en-US/profiles/Fguisset), [Maian](/en-US/profiles/Maian), [Callek](/en-US/profiles/Callek), [Dria](/en-US/profiles/Dria), [Hao2lian](/en-US/profiles/Hao2lian), [JesseW](/en-US/profiles/JesseW)

 **Last updated by:** [chrisdavidmills](/en-US/profiles/chrisdavidmills), Jan 31, 2018, 10:13:42 AM
