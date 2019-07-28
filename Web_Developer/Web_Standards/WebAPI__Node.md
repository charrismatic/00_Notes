

https://developer.mozilla.org/en-US/docs/Web/API/Node

# Node - Web APIs | MDN

---------------------------


**`Node`** is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.

The following interfaces all inherit from `Node` its methods and properties: [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree."), [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element."), [`CharacterData`](/en-US/docs/Web/API/CharacterData "The CharacterData abstract interface represents a Node object that contains characters. This is an abstract interface, meaning there aren't any object of type CharacterData: it is implemented by other interfaces, like Text, Comment, or ProcessingInstruction which aren't abstract.") (which [`Text`](/en-US/docs/Web/API/Text "The Text interface represents the textual content of Element or Attr.  If an element has no markup within its content, it has a single child implementing Text that contains the element's text.  However, if the element contains markup, it is parsed into information items and Text nodes that form its children."), [`Comment`](/en-US/docs/Web/API/Comment "The Comment interface represents textual notations within markup; although it is generally not visually shown, such comments are available to be read in the source view. Comments are represented in HTML and XML as content between '<!--' and '-->'. In XML, the character sequence '--' cannot be used within a comment."), and [`CDATASection`](/en-US/docs/Web/API/CDATASection "The CDATASection interface represents a CDATA section that can be used within XML to include extended portions of unescaped text, such that the symbols < and & do not need escaping as they normally do within XML when used as text.") inherit), [`ProcessingInstruction`](/en-US/docs/Web/API/ProcessingInstruction "A processing instruction embeds application-specific instructions in XML which can be ignored by other applications that don't recognize them."), [`DocumentFragment`](/en-US/docs/Web/API/DocumentFragment "The DocumentFragment interface represents a minimal document object that has no parent. It is used as a lightweight version of Document that stores a segment of a document structure comprised of nodes just like a standard document. The key difference is that because the document fragment isn't part of the active document tree structure, changes made to the fragment don't affect the document, cause reflow, or incur any performance impact that can occur when changes are made."), [`DocumentType`](/en-US/docs/Web/API/DocumentType "The DocumentType interface represents a Node containing a doctype."), [`Notation`](/en-US/docs/Web/API/Notation "Represents a DTD notation (read-only). May declare format of an unparsed entity or formally declare the document's processing instruction targets. Inherits methods and properties from Node. Its nodeName is the notation name. Has no parent."), [`Entity`](/en-US/docs/Web/API/Entity "Read-only reference to a DTD entity. Also inherits the methods and properties of Node."), [`EntityReference`](/en-US/docs/Web/API/EntityReference "Read-only reference to an entity reference in the DOM tree. Has no properties or methods of its own but inherits from Node.")

These interfaces may return null in particular cases where the methods and properties are not relevant. They may throw an exception - for example when adding children to a node type for which no children can exist.

```
<div id="interfaceDiagram" style="display: inline-block; position: relative; width: 100%; padding-bottom: 11.666666666666666%; vertical-align: middle; overflow: hidden;"><svg style="display: inline-block; position: absolute; top: 0; left: 0;" viewbox="-50 0 600 70" preserveAspectRatio="xMinYMin meet"><a xlink:href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget" target="_top"><rect x="1" y="1" width="110" height="50" fill="#fff" stroke="#D4DDE4" stroke-width="2px" /><text  x="56" y="30" font-size="12px" font-family="Consolas,Monaco,Andale Mono,monospace" fill="#4D4E53" text-anchor="middle" alignment-baseline="middle">EventTarget</text></a><polyline points="111,25  121,20  121,30  111,25" stroke="#D4DDE4" fill="none"/><line x1="121" y1="25" x2="151" y2="25" stroke="#D4DDE4"/><a xlink:href="https://developer.mozilla.org/en-US/docs/Web/API/Node" target="_top"><rect x="151" y="1" width="75" height="50" fill="#F4F7F8" stroke="#D4DDE4" stroke-width="2px" /><text  x="188.5" y="30" font-size="12px" font-family="Consolas,Monaco,Andale Mono,monospace" fill="#4D4E53" text-anchor="middle" alignment-baseline="middle">Node</text></a></svg></div>
```

```
a:hover text { fill: #0095DD; pointer-events: all;}
```

## Properties

_Inherits properties from its parents [`EventTarget`](/en-US/docs/Web/API/EventTarget "EventTarget is an interface implemented by objects that can receive events and may have listeners for them.")_.\[1\]

[`Node.baseURI`](/en-US/docs/Web/API/Node/baseURI "The Node.baseURI read-only property returns the absolute base URL of a node.") Read only

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the base URL. The concept of base URL changes from one language to another; in HTML, it corresponds to the protocol, the domain name and the directory structure, that is all until the last `'/'`.

[`Node.baseURIObject`](/en-US/docs/Web/API/Node/baseURIObject "The Node.baseURIObject property returns the nsIURI representing the node's (typically a document or an element) base URL. It's similar to Node.baseURI, except it returns an nsIURI instead of a string.")

(Not available to web content.) The read-only `[nsIURI](/en-US/docs/Mozilla/Tech/XPCOM/Reference/Interface/nsIURI)` object representing the base URI for the element.

[`Node.childNodes`](/en-US/docs/Web/API/Node/childNodes "The Node.childNodes read-only property returns a live NodeList of child nodes of the given element where the first child node is assigned index 0.") Read only

Returns a live [`NodeList`](/en-US/docs/Web/API/NodeList "NodeList objects are collections of nodes such as those returned by properties such as Node.childNodes and the document.querySelectorAll() method.") containing all the children of this node. [`NodeList`](/en-US/docs/Web/API/NodeList "NodeList objects are collections of nodes such as those returned by properties such as Node.childNodes and the document.querySelectorAll() method.") being live means that if the children of the `Node` change, the [`NodeList`](/en-US/docs/Web/API/NodeList "NodeList objects are collections of nodes such as those returned by properties such as Node.childNodes and the document.querySelectorAll() method.") object is automatically updated.

[`Node.firstChild`](/en-US/docs/Web/API/Node/firstChild "The Node.firstChild read-only property returns the node's first child in the tree, or null if the node has no children.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") representing the first direct child node of the node, or `null` if the node has no child.

[`Node.isConnected`](/en-US/docs/Web/API/Node/isConnected "The isConnected read-only property of the Node interface returns a boolean indicating whether the Node is connected (directly or indirectly) to the context object, for example the Document object in the case of the normal DOM, or the ShadowRoot in the case of a shadow DOM.") Read only

Returns a boolean indicating whether or not the Node is connected (directly or indirectly) to the context object, e.g. the [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.") object in the case of the normal DOM, or the [`ShadowRoot`](/en-US/docs/Web/API/ShadowRoot "The ShadowRoot interface of the Shadow DOM API is the root node of a DOM subtree that is rendered separately from a document's main DOM tree.") in the case of a shadow DOM.

[`Node.lastChild`](/en-US/docs/Web/API/Node/lastChild "The Node.lastChild read-only property returns the last child of the node. If its parent is an element, then the child is generally an element node, a text node, or a comment node. It returns null if there are no child elements.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") representing the last direct child node of the node, or `null` if the node has no child.

[`Node.nextSibling`](/en-US/docs/Web/API/Node/nextSibling "The Node.nextSibling read-only property returns the node immediately following the specified one in its parent's childNodes list, or null if the specified node is the last node in that list.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") representing the next node in the tree, or `null` if there isn't such node.

[`Node.nodeName`](/en-US/docs/Web/API/Node/nodeName "The Node.nodeName read-only property returns the name of the current node as a string.") Read only

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") containing the name of the `Node`. The structure of the name will differ with the node type. E.g. An [`HTMLElement`](/en-US/docs/Web/API/HTMLElement "The HTMLElement interface represents any HTML element. Some elements directly implement this interface, others implement it via an interface that inherits it.") will contain the name of the corresponding tag, like `'audio'` for an [`HTMLAudioElement`](/en-US/docs/Web/API/HTMLAudioElement "The HTMLAudioElement interface provides access to the properties of <audio> elements, as well as methods to manipulate them. It derives from the HTMLMediaElement interface."), a [`Text`](/en-US/docs/Web/API/Text "The Text interface represents the textual content of Element or Attr.  If an element has no markup within its content, it has a single child implementing Text that contains the element's text.  However, if the element contains markup, it is parsed into information items and Text nodes that form its children.") node will have the `'#text'` string, or a [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.") node will have the `'#document'` string.

[`Node.nodePrincipal`](/en-US/docs/Web/API/Node/nodePrincipal "The Node.nodePrincipal read-only property returns the nsIPrincipal object representing current security context of the node.")

A `[nsIPrincipal](/en-US/docs/Mozilla/Tech/XPCOM/Reference/Interface/nsIPrincipal)` representing the node principal.

[`Node.nodeType`](/en-US/docs/Web/API/Node/nodeType "The read-only Node.nodeType property that represents the type of the node.")Read only

Returns an `unsigned short` representing the type of the node. Possible values are:

| Name                          | Value |
| ----------------------------- | ----- |
| `ELEMENT_NODE`                | `1`   |
| `ATTRIBUTE_NODE`              | `2`   |
| `TEXT_NODE`                   | `3`   |
| `CDATA_SECTION_NODE`          | `4`   |
| `ENTITY_REFERENCE_NODE`       | `5`   |
| `ENTITY_NODE`                 | `6`   |
| `PROCESSING_INSTRUCTION_NODE` | `7`   |
| `COMMENT_NODE`                | `8`   |
| `DOCUMENT_NODE`               | `9`   |
| `DOCUMENT_TYPE_NODE`          | `10`  |
| `DOCUMENT_FRAGMENT_NODE`      | `11`  |
| `NOTATION_NODE`               | `12`  |

[`Node.nodeValue`](/en-US/docs/Web/API/Node/nodeValue "The Node.nodeValue property returns or sets the value of the current node.")

Returns / Sets the value of the current node

[`Node.ownerDocument`](/en-US/docs/Web/API/Node/ownerDocument "The Node.ownerDocument read-only property returns the top-level document object for this node.") Read only

Returns the [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.") that this node belongs to. If the node is itself a document, returns `null`.

[`Node.parentNode`](/en-US/docs/Web/API/Node/parentNode "The Node.parentNode read-only property returns the parent of the specified node in the DOM tree.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") that is the parent of this node. If there is no such node, like if this node is the top of the tree or if doesn't participate in a tree, this property returns `null`.

[`Node.parentElement`](/en-US/docs/Web/API/Node/parentElement "The Node.parentElement read-only property returns the DOM node's parent Element, or null if the node either has no parent, or its parent isn't a DOM Element.") Read only

Returns an [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element.") that is the parent of this node. If the node has no parent, or if that parent is not an [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element."), this property returns `null`.

[`Node.previousSibling`](/en-US/docs/Web/API/Node/previousSibling "The Node.previousSibling read-only property returns the node immediately preceding the specified one in its parent's childNodes list, or null if the specified node is the first in that list.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") representing the previous node in the tree, or `null` if there isn't such node.

[`Node.textContent`](/en-US/docs/Web/API/Node/textContent "The Node.textContent property represents the text content of a node and its descendants.")

Returns / Sets the textual content of an element and all its descendants.

### Deprecated properties

[`Node.rootNode`](/en-US/docs/Web/API/Node/rootNode "The Node.rootNode read-only property returns a Node object representing the topmost node in the tree, or the current node if it's the topmost node in the tree. This is found by walking backward along Node.parentNode until the top is reached.") Read only

Returns a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") object representing the topmost node in the tree, or the current node if it's the topmost node in the tree. This has been replaced by [`Node.getRootNode()`](/en-US/docs/Web/API/Node/getRootNode "The getRootNode() method of the Node interface returns the context object's root, which optionally includes the shadow root if it is available.").

### Obsolete properties

[`Node.localName`](/en-US/docs/Web/API/Node/localName "The Node.localName read-only property returns the local part of the qualified name of this node.") Read only

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the local part of the qualified name of an element.

**Note:** In Firefox 3.5 and earlier, the property upper-cases the local name for HTML elements (but not XHTML elements). In later versions, this does not happen, so the property is in lower case for both HTML and XHTML.

[`Node.namespaceURI`](/en-US/docs/Web/API/Node/namespaceURI "The Node.namespaceURI read-only property returns the namespace URI of the node, or null if the node is not in a namespace. When the node is a document, it returns the XML namespace for the current document.") Read only

The namespace URI of this node, or `null` if it is no namespace.

**Note:** In Firefox 3.5 and earlier, HTML elements are in no namespace. In later versions, HTML elements are in the `[http://www.w3.org/1999/xhtml/](https://www.w3.org/1999/xhtml/ "Linkification: http://www.w3.org/1999/xhtml")` namespace in both HTML and XML trees.

[`Node.prefix`](/en-US/docs/Web/API/Node/prefix "The Node.prefix read-only property returns the namespace prefix of the specified node, or null if no prefix is specified.") Read only

Is a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") representing the namespace prefix of the node, or `null` if no prefix is specified.

## Methods

_Inherits methods from its parent, [`EventTarget`](/en-US/docs/Web/API/EventTarget "EventTarget is an interface implemented by objects that can receive events and may have listeners for them.")_.\[1\]

[`Node.appendChild()`](/en-US/docs/Web/API/Node/appendChild "The Node.appendChild() method adds a node to the end of the list of children of a specified parent node. If the given child is a reference to an existing node in the document, appendChild() moves it from its current position to the new position (there is no requirement to remove the node from its parent node before appending it to some other node).")

Adds the specified childNode argument as the last child to the current node.  
If the argument referenced an existing node on the DOM tree, the node will be detached from its current position and attached at the new position.

[`Node.cloneNode()`](/en-US/docs/Web/API/Node/cloneNode "The Node.cloneNode() method returns a duplicate of the node on which this method was called.")

Clone a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way."), and optionally, all of its contents. By default, it clones the content of the node.

[`Node.compareDocumentPosition()`](/en-US/docs/Web/API/Node/compareDocumentPosition "The Node.compareDocumentPosition() method compares the position of the current node against another node in any other document.")

Compares the position of the current node against another node in any other document.

[`Node.contains()`](/en-US/docs/Web/API/Node/contains "The Node.contains() method returns a Boolean value indicating whether a node is a descendant of a given node, i.e. the node itself, one of its direct children (childNodes), one of the children's direct children, and so on.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") value indicating whether a node is a descendant of a given node or not.

[`Node.getRootNode()`](/en-US/docs/Web/API/Node/getRootNode "The getRootNode() method of the Node interface returns the context object's root, which optionally includes the shadow root if it is available.")

Returns the context object's root which optionally includes the shadow root if it is available. 

[`Node.hasChildNodes()`](/en-US/docs/Web/API/Node/hasChildNodes "There are various ways to determine whether the node has a child node.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element has any child nodes, or not.

[`Node.insertBefore()`](/en-US/docs/Web/API/Node/insertBefore "The Node.insertBefore() method inserts a node before the reference node as a child of a specified parent node. If the given child is a reference to an existing node in the document, insertBefore() moves it from its current position to the new position (there is no requirement to remove the node from its parent node before appending it to some other node).")

Inserts a [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") before the reference node as a child of a specified parent node.

[`Node.isDefaultNamespace()`](/en-US/docs/Web/API/Node/isDefaultNamespace "The Node.isDefaultNamespace() method accepts a namespace URI as an argument and returns a Boolean with a value of true if the namespace is the default namespace on the given node or false if not.")

Accepts a namespace URI as an argument and returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") with a value of `true` if the namespace is the default namespace on the given node or `false` if not.

[`Node.isEqualNode()`](/en-US/docs/Web/API/Node/isEqualNode "The Node.isEqualNode() method tests whether two nodes are equal. Two nodes are equal when they have the same type, defining characteristics (for elements, this would be their ID, number of children, and so forth), its attributes match, and so on. The specific set of data points that must match varies depending on the types of the nodes.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") which indicates whether or not two nodes are of the same type and all their defining data points match.

[`Node.isSameNode()`](/en-US/docs/Web/API/Node/isSameNode "The Node.isSameNode() method tests whether two nodes are the same, that is if they reference the same object.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") value indicating whether or not the two nodes are the same (that is, they reference the same object).

[`Node.lookupPrefix()`](/en-US/docs/Web/API/Node/lookupPrefix "The Node.lookupPrefix() method returns a DOMString containing the prefix for a given namespace URI, if present, and null if not. When multiple prefixes are possible, the result is implementation-dependent.")

Returns a [`DOMString`](/en-US/docs/Web/API/DOMString "DOMString is a UTF-16 String. As JavaScript already uses such strings, DOMString is mapped directly to a String.") containing the prefix for a given namespace URI, if present, and `null` if not. When multiple prefixes are possible, the result is implementation-dependent.

[`Node.lookupNamespaceURI()`](/en-US/docs/Web/API/Node/lookupNamespaceURI "The Node.lookupNamespaceURI() method accepts a prefix and returns the namespace URI associated with it on the given node if found (and null if not). Supplying null for the prefix will return the default namespace.")

Accepts a prefix and returns the namespace URI associated with it on the given node if found (and `null` if not). Supplying `null` for the prefix will return the default namespace.

[`Node.normalize()`](/en-US/docs/Web/API/Node/normalize "The Node.normalize() method puts the specified node and all of its sub-tree into a "normalized" form. In a normalized sub-tree, no text nodes in the sub-tree are empty and there are no adjacent text nodes.")

Clean up all the text nodes under this element (merge adjacent, remove empty).

[`Node.removeChild()`](/en-US/docs/Web/API/Node/removeChild "The Node.removeChild() method removes a child node from the DOM. Returns removed node.")

Removes a child node from the current element, which must be a child of the current node.

[`Node.replaceChild()`](/en-US/docs/Web/API/Node/replaceChild "The Node.replaceChild() method replaces one child node of the specified node with another.")

Replaces one child [`Node`](/en-US/docs/Web/API/Node "Node is an interface from which a number of DOM API object types inherit; it allows these various types to be treated similarly, for example inheriting the same set of methods, or being tested in the same way.") of the current one with the second one given in parameter.

### Obsolete methods

[`Node.getFeature()`](/en-US/docs/Web/API/Node/getFeature "The documentation about this has not yet been written; please consider contributing!")

x

[`Node.getUserData()`](/en-US/docs/Web/API/Node/getUserData "The Node.getUserData() method returns any user DOMUserData set previously on the given node by Node.setUserData().")

Allows a user to get some [`DOMUserData`](/en-US/docs/Web/API/DOMUserData "DOMUserData refers to application data. In JavaScript, it maps directly to Object. It is returned or used as an argument by Node.setUserData(), Node.getUserData(), used as the third argument to handle() on UserDataHandler, and is used or returned by various DOMConfiguration methods.") from the node.

[`Node.hasAttributes()`](/en-US/docs/Web/API/Node/hasAttributes "The documentation about this has not yet been written; please consider contributing!")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") indicating if the element has any attributes, or not.

[`Node.isSupported()`](/en-US/docs/Web/API/Node/isSupported "The Node.isSupported()returns a Boolean flag containing the result of a test whether the DOM implementation implements a specific feature and this feature is supported by the specific node.")

Returns a [`Boolean`](/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean "The Boolean object is an object wrapper for a boolean value.") flag containing the result of a test whether the DOM implementation implements a specific feature and this feature is supported by the specific node.

[`Node.setUserData()`](/en-US/docs/Web/API/Node/setUserData "The Node.setUserData() method allows a user to attach (or remove) data to an element, without needing to modify the DOM. Note that such data will not be preserved when imported via Node.importNode, as with Node.cloneNode() and Node.renameNode() operations (though Node.adoptNode does preserve the information), and equality tests in Node.isEqualNode() do not consider user data in making the assessment.")

Allows a user to attach, or remove, [`DOMUserData`](/en-US/docs/Web/API/DOMUserData "DOMUserData refers to application data. In JavaScript, it maps directly to Object. It is returned or used as an argument by Node.setUserData(), Node.getUserData(), used as the third argument to handle() on UserDataHandler, and is used or returned by various DOMConfiguration methods.") to the node.

## Examples

### Browse all child nodes

The following function recursively cycles all child nodes of a node and executes a callback function upon them (and upon the parent node itself).

```
function DOMComb (oParent, oCallback) {
  if (oParent.hasChildNodes()) {
    for (var oNode = oParent.firstChild; oNode; oNode = oNode.nextSibling) {
      DOMComb(oNode, oCallback);
    }
  }
  oCallback.call(oParent);
}
```

#### Syntax

```
DOMComb(parentNode, callbackFunction);
```

#### Description

Recursively cycle all child nodes of `parentNode` and `parentNode` itself and execute the `callbackFunction` upon them as [`this`](/en-US/docs/JavaScript/Reference/Operators/this "en-US/docs/JavaScript/Reference/Operators/this") objects.

#### Parameters

`parentNode`

The parent node (`**Node** [Object](/en-US/docs/JavaScript/Reference/Global_Objects/Object "en-US/docs/JavaScript/Reference/Global_Objects/Object")`).

`callbackFunction`

The callback function ([`Function`](/en-US/docs/JavaScript/Reference/Global_Objects/Function "en-US/docs/JavaScript/Reference/Global_Objects/Function")).

#### Sample usage

The following example send to the `console.log` the text content of the body:

```
function printContent () {
  if (this.nodeValue) { console.log(this.nodeValue); }
}

onload = function () {
  DOMComb(document.body, printContent);
};
```

### Remove all children nested within a node

```
Element.prototype.removeAll = function () {
  while (this.firstChild) { this.removeChild(this.firstChild); }
  return this;
};
```

#### Sample usage

```
/* ... an alternative to document.body.innerHTML = "" ... */
document.body.removeAll();
```

## Specifications

| Specification | Status | Comment |
| --- | --- | --- |
| [DOM  
The definition of 'Node' in that specification.](https://dom.spec.whatwg.org/#interface-node) | Living Standard | Removed the following properties: `attributes`, `namespaceURI`, `prefix`, and `localName`.  
Removed the following methods: `isSupported()`, `hasAttributes()`, `getFeature()`, `setUserData()`, and `getUserData()`. |
| [Document Object Model (DOM) Level 3 Core Specification  
The definition of 'Node' in that specification.](https://www.w3.org/TR/DOM-Level-3-Core/core.html#ID-1950641247) | Obsolete | The methods `insertBefore()`, `replaceChild()`, `removeChild()`, and `appendChild()` returns one more kind of error (`NOT_SUPPORTED_ERR`) if called on a [`Document`](/en-US/docs/Web/API/Document "The Document interface represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.").  
The `normalize()` method has been modified so that [`Text`](/en-US/docs/Web/API/Text "The Text interface represents the textual content of Element or Attr.  If an element has no markup within its content, it has a single child implementing Text that contains the element's text.  However, if the element contains markup, it is parsed into information items and Text nodes that form its children.") node can also be normalized if the proper [`DOMConfiguration`](/en-US/docs/Web/API/DOMConfiguration "Pre-defined parameters: "canonical-form", "cdata-sections", "check-character-normalization", "comments", "datatype-normalization", "element-content-whitespace", "entities", "error-handler", "infoset", "namespaces", "namespace-declarations", "normalize-characters","schema-location", "schema-type", "split-cdata-sections", "validate", "validate-if-schema", "well-formed"") flag is set.  
Added the following methods: `compareDocumentPosition()`, `isSameNode()`, `lookupPrefix()`, `isDefaultNamespace()`, `lookupNamespaceURI()`, `isEqualNode()`, `getFeature()`, `setUserData()`, and `getUserData().`  
Added the following properties: `baseURI` and `textContent`. |
| [Document Object Model (DOM) Level 2 Core Specification  
The definition of 'Node' in that specification.](https://www.w3.org/TR/DOM-Level-2-Core/core.html#ID-1950641247) | Obsolete | The `ownerDocument` property was slightly modified so that [`DocumentFragment`](/en-US/docs/Web/API/DocumentFragment "The DocumentFragment interface represents a minimal document object that has no parent. It is used as a lightweight version of Document that stores a segment of a document structure comprised of nodes just like a standard document. The key difference is that because the document fragment isn't part of the active document tree structure, changes made to the fragment don't affect the document, cause reflow, or incur any performance impact that can occur when changes are made.") also returns `null`.  
Added the following properties: `namespaceURI`, `prefix`, and `localName`.  
Added the following methods: `normalize()`, `isSupported()` and `hasAttributes()`. |
| [Document Object Model (DOM) Level 1 Specification  
The definition of 'Node' in that specification.](https://www.w3.org/TR/REC-DOM-Level-1/level-one-core.html#ID-1950641247) | Obsolete | Initial definition |

## Browser compatibility

The compatibility table on this page is generated from structured data. If you'd like to contribute to the data, please check out [https://github.com/mdn/browser-compat-data](https://github.com/mdn/browser-compat-data) and send us a pull request.

*   Desktop
*   Mobile

| Feature                                                      | Chrome                     | Edge | Firefox                  | Internet Explorer | Opera                 | Safari                |
| ------------------------------------------------------------ | -------------------------- | ---- | ------------------------ | ----------------- | --------------------- | --------------------- |
| [Basic support](https://developer.mozilla.org/docs/Web/API/Node) | Yes[1](#compatNote_1)      | Yes  | 1                        | 9                 | Yes[1](#compatNote_1) | Yes[1](#compatNote_1) |
| [`baseURI`](https://developer.mozilla.org/docs/Web/API/Node/baseURI) | Yes                        | 12   | ?                        | ?                 | ?                     | ?                     |
| [`baseURIObject`](https://developer.mozilla.org/docs/Web/API/Node/baseURIObject) | ?                          | ?    | ?                        | ?                 | ?                     | ?                     |
| [`childNodes`](https://developer.mozilla.org/docs/Web/API/Node/childNodes) | Yes                        | 12   | 1                        | Yes               | Yes                   | Yes                   |
| [`firstChild`](https://developer.mozilla.org/docs/Web/API/Node/firstChild) | Yes                        | 12   | 1                        | Yes               | Yes                   | Yes                   |
| [`getRootNode`](https://developer.mozilla.org/docs/Web/API/Node/getRootNode) | 54                         | ?    | 53                       | ?                 | 41                    | 10.1                  |
| [`innerText`](https://developer.mozilla.org/docs/Web/API/Node/innerText) | 4                          | ?    | 45                       | 10                | 9.6                   | 3                     |
| [`isConnected`](https://developer.mozilla.org/docs/Web/API/Node/isConnected) | 51                         | ?    | 53                       | ?                 | 38                    | 10.1                  |
| [`lastChild`](https://developer.mozilla.org/docs/Web/API/Node/lastChild) | Yes                        | 12   | 1                        | Yes               | Yes                   | Yes                   |
| [`localName`](https://developer.mozilla.org/docs/Web/API/Node/localName) | Yes — 46[2](#compatNote_2) | 12   | 1 — 48[2](#compatNote_2) | ?                 | ?                     | ?                     |
| [`namespaceURI`](https://developer.mozilla.org/docs/Web/API/Node/namespaceURI) | Yes — 46[2](#compatNote_2) | 12   | 1 — 48[2](#compatNote_2) | ?                 | ?                     | ?                     |
| [`nextSibling`](https://developer.mozilla.org/docs/Web/API/Node/nextSibling) | Yes                        | 12   | ?                        | ?                 | Yes                   | ?                     |
| [`nodeName`](https://developer.mozilla.org/docs/Web/API/Node/nodeName) | Yes                        | 12   | ?                        | ?                 | ?                     | ?                     |
| [`nodePrincipal`](https://developer.mozilla.org/docs/Web/API/Node/nodePrincipal) | Yes — 46[2](#compatNote_2) | ?    | ?                        | ?                 | ?                     | ?                     |
| [`nodeType`](https://developer.mozilla.org/docs/Web/API/Node/nodeType) | Yes                        | 12   | ?                        | ?                 | Yes                   | ?                     |
| [`nodeValue`](https://developer.mozilla.org/docs/Web/API/Node/nodeValue) | Yes                        | 12   | ?                        | ?                 | Yes                   | ?                     |
| [`outerText`](https://developer.mozilla.org/docs/Web/API/Node/outerText) | No                         | ?    | ?                        | ?                 | No                    | ?                     |
| [`ownerDocument`](https://developer.mozilla.org/docs/Web/API/Node/ownerDocument) | Yes                        | 12   |                          |                   |                       |                       |
Yes

9[3](#compatNote_3)

 | 6[4](#compatNote_4) | Yes | ? |
| [`parentElement`](https://developer.mozilla.org/docs/Web/API/Node/parentElement) | Yes | 12 | 9 | Yes[5](#compatNote_5) | Yes | Yes |
| [`parentNode`](https://developer.mozilla.org/docs/Web/API/Node/parentNode) | Yes | 12 | 1 | Yes | Yes | Yes |
| [`prefix`](https://developer.mozilla.org/docs/Web/API/Node/prefix) | No | 12 | 

1 — 48[2](#compatNote_2)

5[6](#compatNote_6)

 | Yes[5](#compatNote_5) | No | Yes |
| [`previousSibling`](https://developer.mozilla.org/docs/Web/API/Node/previousSibling) | Yes | 12 | ? | ? | Yes | ? |
| [`rootNode`](https://developer.mozilla.org/docs/Web/API/Node/rootNode) | No | ? | No | ? | No | ? |
| [`textContent`](https://developer.mozilla.org/docs/Web/API/Node/textContent) | 1 | 12 | 2 | 9 | Yes | 3 |

| Feature                                                      | Android webview            | Chrome for Android         | Edge mobile | Firefox for Android | Opera Android         | iOS Safari            | Samsung Internet |
| ------------------------------------------------------------ | -------------------------- | -------------------------- | ----------- | ------------------- | --------------------- | --------------------- | ---------------- |
| [Basic support](https://developer.mozilla.org/docs/Web/API/Node) | Yes[1](#compatNote_1)      | Yes[1](#compatNote_1)      | ?           | 4                   | Yes[1](#compatNote_1) | Yes[1](#compatNote_1) | Yes              |
| [`baseURI`](https://developer.mozilla.org/docs/Web/API/Node/baseURI) | Yes                        | Yes                        | ?           | ?                   | ?                     | ?                     | Yes              |
| [`baseURIObject`](https://developer.mozilla.org/docs/Web/API/Node/baseURIObject) | ?                          | ?                          | ?           | ?                   | ?                     | ?                     | ?                |
| [`childNodes`](https://developer.mozilla.org/docs/Web/API/Node/childNodes) | Yes                        | Yes                        | ?           | 4                   | Yes                   | Yes                   | Yes              |
| [`firstChild`](https://developer.mozilla.org/docs/Web/API/Node/firstChild) | Yes                        | Yes                        | ?           | 4                   | Yes                   | Yes                   | Yes              |
| [`getRootNode`](https://developer.mozilla.org/docs/Web/API/Node/getRootNode) | 54                         | 54                         | ?           | 53                  | 41                    | 10.1                  | ?                |
| [`innerText`](https://developer.mozilla.org/docs/Web/API/Node/innerText) | Yes                        | Yes                        | ?           | 45                  | Yes                   | 4                     | Yes              |
| [`isConnected`](https://developer.mozilla.org/docs/Web/API/Node/isConnected) | 51                         | 51                         | ?           | 45                  | 38                    | 10.1                  | 6.0              |
| [`lastChild`](https://developer.mozilla.org/docs/Web/API/Node/lastChild) | Yes                        | Yes                        | ?           | 45                  | Yes                   | Yes                   | Yes              |
| [`localName`](https://developer.mozilla.org/docs/Web/API/Node/localName) | Yes — 46[2](#compatNote_2) | Yes — 46[2](#compatNote_2) | Yes         | 45                  | Yes                   | Yes                   | Yes              |
| [`namespaceURI`](https://developer.mozilla.org/docs/Web/API/Node/namespaceURI) | Yes — 46[2](#compatNote_2) | Yes — 46[2](#compatNote_2) | Yes         | 45                  | Yes                   | Yes                   | Yes              |
| [`nextSibling`](https://developer.mozilla.org/docs/Web/API/Node/nextSibling) | Yes                        | Yes                        | ?           | ?                   | Yes                   | ?                     | Yes              |
| [`nodeName`](https://developer.mozilla.org/docs/Web/API/Node/nodeName) | Yes                        | Yes                        | ?           | ?                   | ?                     | ?                     | Yes              |
| [`nodePrincipal`](https://developer.mozilla.org/docs/Web/API/Node/nodePrincipal) | Yes — 46[2](#compatNote_2) | Yes — 46[2](#compatNote_2) | ?           | ?                   | ?                     | ?                     | Yes              |
| [`nodeType`](https://developer.mozilla.org/docs/Web/API/Node/nodeType) | Yes                        | Yes                        | ?           | ?                   | Yes                   | ?                     | Yes              |
| [`nodeValue`](https://developer.mozilla.org/docs/Web/API/Node/nodeValue) | Yes                        | Yes                        | ?           | ?                   | Yes                   | ?                     | Yes              |
| [`outerText`](https://developer.mozilla.org/docs/Web/API/Node/outerText) | No                         | No                         | ?           | ?                   | No                    | ?                     | No               |
| [`ownerDocument`](https://developer.mozilla.org/docs/Web/API/Node/ownerDocument) | Yes                        | Yes                        | Yes         |                     |                       |                       |                  |
Yes

9[3](#compatNote_3)

 | Yes | ? | Yes |
| [`parentElement`](https://developer.mozilla.org/docs/Web/API/Node/parentElement) | Yes | Yes | Yes | 9 | Yes | ? | Yes |
| [`parentNode`](https://developer.mozilla.org/docs/Web/API/Node/parentNode) | Yes | Yes | Yes | 4 | Yes | Yes | Yes |
| [`prefix`](https://developer.mozilla.org/docs/Web/API/Node/prefix) | No | No | Yes | 9 | No | ? | No |
| [`previousSibling`](https://developer.mozilla.org/docs/Web/API/Node/previousSibling) | Yes | Yes | ? | ? | Yes | ? | Yes |
| [`rootNode`](https://developer.mozilla.org/docs/Web/API/Node/rootNode) | No | No | ? | No | No | ? | No |
| [`textContent`](https://developer.mozilla.org/docs/Web/API/Node/textContent) | Yes | Yes | Yes | ? | Yes | ? | Yes |

1\. WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.

2\. This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.

3\. The `ownerDocument` of doctype nodes (that is, nodes for which `Node.nodeType` is Node. `DOCUMENT_TYPE_NODE` or 10) is no longer null. Instead, the `ownerDocument` is the document on which `document.implementation.createDocumentType()` was called.

4\. See [MSDN](http://msdn.microsoft.com/en-us/library/ie/ms534315(v=vs.85).aspx).

5\. Only supported on `Element`.

6\. this property was read-write; starting with Firefox 5.0 it is read-only, following the specification.

[New compatibility tables are in beta](/docs/New_Compatibility_Tables_Beta)

*   [More about the beta.](/docs/New_Compatibility_Tables_Beta)
*   [Take the survey](https://www.surveygizmo.com/s3/2342437/0b5ff6b6b8f6)
*   Report an error.
*   Show old table.

|      | Desktop | Mobile |
| ---- | ------- | ------ |
|      | Chrome  | Edge   |
| ---  | ---     | ---    |
| Basic support | Full support Yes
Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes | Full support 1 | Full support 9 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | ? | Full support 4 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes WebKit and old versions of Blink incorrectly do not make `Node` inherit from `EventTarget`.





 | Full support Yes |
| [`baseURI`](/docs/Web/API/Node/baseURI) | Full support Yes | Full support 12 | ? | ? | ? | ? | Full support Yes | Full support Yes | ? | ? | ? | ? | Full support Yes |
| [`baseURIObject`](/docs/Web/API/Node/baseURIObject)

DeprecatedNon-standard

 | ? | ? | ? | ? | ? | ? | ? | ? | ? | ? | ? | ? | ? |
| [`childNodes`](/docs/Web/API/Node/childNodes) | Full support Yes | Full support 12 | Full support 1 | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | ? | Full support 4 | Full support Yes | Full support Yes | Full support Yes |
| [`firstChild`](/docs/Web/API/Node/firstChild) | Full support Yes | Full support 12 | Full support 1 | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | ? | Full support 4 | Full support Yes | Full support Yes | Full support Yes |
| [`getRootNode`](/docs/Web/API/Node/getRootNode) | Full support 54 | ? | Full support 53 | ? | Full support 41 | Full support 10.1 | Full support 54 | Full support 54 | ? | Full support 53 | Full support 41 | Full support 10.1 | ? |
| [`innerText`](/docs/Web/API/Node/innerText) | Full support 4 | ? | Full support 45 | Full support 10 | Full support 9.6 | Full support 3 | Full support Yes | Full support Yes | ? | Full support 45 | Full support Yes | Full support 4 | Full support Yes |
| [`isConnected`](/docs/Web/API/Node/isConnected) | Full support 51 | ? | Full support 53 | ? | Full support 38 | Full support 10.1 | Full support 51 | Full support 51 | ? | Full support 45 | Full support 38 | Full support 10.1 | Full support 6.0 |
| [`lastChild`](/docs/Web/API/Node/lastChild) | Full support Yes | Full support 12 | Full support 1 | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | ? | Full support 45 | Full support Yes | Full support Yes | Full support Yes |
| [`localName`](/docs/Web/API/Node/localName)

DeprecatedNon-standard

 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | Full support 12 | No support 1 — 48

Notes

Open

No support 1 — 48

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | ? | ? | ? | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | Full support Yes | Full support 45 | Full support Yes | Full support Yes | Full support Yes |
| [`namespaceURI`](/docs/Web/API/Node/namespaceURI)

DeprecatedNon-standard

 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | Full support 12 | No support 1 — 48

Notes

Open

No support 1 — 48

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | ? | ? | ? | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | Full support Yes | Full support 45 | Full support Yes | Full support Yes | Full support Yes |
| [`nextSibling`](/docs/Web/API/Node/nextSibling) | Full support Yes | Full support 12 | ? | ? | Full support Yes | ? | Full support Yes | Full support Yes | ? | ? | Full support Yes | ? | Full support Yes |
| [`nodeName`](/docs/Web/API/Node/nodeName) | Full support Yes | Full support 12 | ? | ? | ? | ? | Full support Yes | Full support Yes | ? | ? | ? | ? | Full support Yes |
| [`nodePrincipal`](/docs/Web/API/Node/nodePrincipal)

ExperimentalNon-standard

 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | ? | ? | ? | ? | ? | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | No support ? — 46

Notes

Open

No support ? — 46

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.





 | ? | ? | ? | ? | Full support Yes |
| [`nodeType`](/docs/Web/API/Node/nodeType) | Full support Yes | Full support 12 | ? | ? | Full support Yes | ? | Full support Yes | Full support Yes | ? | ? | Full support Yes | ? | Full support Yes |
| [`nodeValue`](/docs/Web/API/Node/nodeValue) | Full support Yes | Full support 12 | ? | ? | Full support Yes | ? | Full support Yes | Full support Yes | ? | ? | Full support Yes | ? | Full support Yes |
| [`outerText`](/docs/Web/API/Node/outerText) | No support No | ? | ? | ? | No support No | ? | No support No | No support No | ? | ? | No support No | ? | No support No |
| [`ownerDocument`](/docs/Web/API/Node/ownerDocument) | Full support Yes | Full support 12 | Full support Yes

Open

Full support Yes

Full support 9

Notes

Notes The `ownerDocument` of doctype nodes (that is, nodes for which `Node.nodeType` is Node. `DOCUMENT_TYPE_NODE` or 10) is no longer null. Instead, the `ownerDocument` is the document on which `document.implementation.createDocumentType()` was called.





 | Full support 6

Notes

Open

Full support 6

Notes

Notes See [MSDN](http://msdn.microsoft.com/en-us/library/ie/ms534315(v=vs.85).aspx).





 | Full support Yes | ? | Full support Yes | Full support Yes | Full support Yes | Full support Yes

Open

Full support Yes

Full support 9

Notes

Notes The `ownerDocument` of doctype nodes (that is, nodes for which `Node.nodeType` is Node. `DOCUMENT_TYPE_NODE` or 10) is no longer null. Instead, the `ownerDocument` is the document on which `document.implementation.createDocumentType()` was called.





 | Full support Yes | ? | Full support Yes |
| [`parentElement`](/docs/Web/API/Node/parentElement) | Full support Yes | Full support 12 | Full support 9 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes Only supported on `Element`.





 | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support 9 | Full support Yes | ? | Full support Yes |
| [`parentNode`](/docs/Web/API/Node/parentNode) | Full support Yes | Full support 12 | Full support 1 | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support Yes | Full support 4 | Full support Yes | Full support Yes | Full support Yes |
| [`prefix`](/docs/Web/API/Node/prefix)

DeprecatedNon-standard

 | No support No | Full support 12 | No support 1 — 48

Notes

Open

No support 1 — 48

Notes

Notes This API was moved to the `Element` and `Attr` APIs according to the DOM4 standard.

Full support 5

Notes

Notes this property was read-write; starting with Firefox 5.0 it is read-only, following the specification.





 | Full support Yes

Notes

Open

Full support Yes

Notes

Notes Only supported on `Element`.





 | No support No | Full support Yes | No support No | No support No | Full support Yes | Full support 9 | No support No | ? | No support No |
| [`previousSibling`](/docs/Web/API/Node/previousSibling) | Full support Yes | Full support 12 | ? | ? | Full support Yes | ? | Full support Yes | Full support Yes | ? | ? | Full support Yes | ? | Full support Yes |
| [`rootNode`](/docs/Web/API/Node/rootNode)

DeprecatedNon-standard

 | No support No | ? | No support No | ? | No support No | ? | No support No | No support No | ? | No support No | No support No | ? | No support No |
| [`textContent`](/docs/Web/API/Node/textContent) | Full support 1 | Full support 12 | Full support 2 | Full support 9 | Full support Yes | Full support 3 | Full support Yes | Full support Yes | Full support Yes | ? | Full support Yes | ? | Full support Yes |

### Legend

Full support  

Full support

No support  

No support

Compatibility unknown  

Compatibility unknown

Experimental. Expect behavior to change in the future.

Experimental. Expect behavior to change in the future.

Non-standard. Expect poor cross-browser support.

Non-standard. Expect poor cross-browser support.

Deprecated. Not for use in new websites.

Deprecated. Not for use in new websites.

See implementation notes.

See implementation notes.

**[We're converting our compatibility data into a machine-readable JSON format](https://github.com/mdn/browser-compat-data)**. This compatibility table still uses the old format, because we haven't yet converted the data it contains. **[Find out how you can help!](/en-US/docs/MDN/Contribute/Structures/Compatibility_tables)**

*   Desktop
*   Mobile

| Feature       | Chrome     | Edge  | Firefox (Gecko)      | Internet Explorer | Opera      | Safari     |
| ------------- | ---------- | ----- | -------------------- | ----------------- | ---------- | ---------- |
| Basic support | (Yes)\[1\] | (Yes) | 1.0 (1.7 or earlier) | 9                 | (Yes)\[1\] | (Yes)\[1\] |
| `getFeature()` | No support | ? | 1.0 (1.7 or earlier)  
No support[7.0](/en-US/Firefox/Releases/7 "Released on 2011-09-26.") (7.0) | ? | No support | No support |
| `getUserData()`, `setUserData()` and `hasAttributes()` | No support | ? | 1.0 (1.7 or earlier)  
No support[22.0](/en-US/Firefox/Releases/22 "Released on 2013-06-25.") (22.0) | ? | No support | No support |
| `isSameNode()` | (Yes) | ? | 1.0 (1.7 or earlier)  
Removed in [10](/en-US/Firefox/Releases/10 "Released on 2012-01-31.") (10)  
Returned in [48](/en-US/Firefox/Releases/48 "Released on 2016-08-02.") (48) | ? | No support | No support |
| `isSupported()` | No support | ? | 1.0 (1.7 or earlier) | ? | ? | ? |
| `attributes` | No support | ? | 1.0 (1.7 or earlier)  
No support[22.0](/en-US/Firefox/Releases/22 "Released on 2013-06-25.") (22.0)\[2\] | No support | No support | No support |
| `rootNode()` | ? | ? | CompatGeckoDesktop(48)}} | ? | ? | ? |
| `getRootNode()`, and `rootNode` deprecated | 54.0 | ? | [53](/en-US/Firefox/Releases/53 "Released on 2017-04-18.") (53) | ? | 41 | ? |

| Feature       | Android | Android Webview | Edge  | Firefox Mobile (Gecko) | IE Mobile | Opera Mobile | Safari Mobile | Chrome for Android |
| ------------- | ------- | --------------- | ----- | ---------------------- | --------- | ------------ | ------------- | ------------------ |
| Basic support | ?       | (Yes)\[1\]      | (Yes) | 1.0 (1.0)              | (Yes)     | (Yes)\[1\]   | (Yes)\[1\]    | (Yes)\[1\]         |
| `getFeature()` | No support | No support | ? | 1.0 (1.0)  
No support[7.0](/en-US/Firefox/Releases/7 "Released on 2011-09-26.") (7.0) | ? | No support | No support | No support |
| `getUserData()`, `setUserData()` and `hasAttributes()` | No support | No support | ? | ? | ? | ? | ? | No support |
| `isSameNode()` | ? | (Yes) | ? | 
1.0 (1.7 or earlier)  
Removed in [10](/en-US/Firefox/Releases/10 "Released on 2012-01-31.") (10)  
Returned in [48](/en-US/Firefox/Releases/48 "Released on 2016-08-02.") (48)

 | ? | ? | ? | (Yes) |
| `isSupported()` | ? | No support | ? | ? | ? | ? | ? | No support |
| `attributes` | ? | No support | ? | ? | ? | ? | ? | No support |
| `rootNode()` | ? | No support | ? | 48.0 (48) | ? | ? | ? | No support |
| `getRootNode()`, and `rootNode` deprecated | No support | 54.0 | ? | 53.0 (53) | ? | 41 | ? | 54.0 |

\[1\] WebKit and old versions of Blink incorrectly do not make `Node` inherit from [`EventTarget`](/en-US/docs/Web/API/EventTarget "EventTarget is an interface implemented by objects that can receive events and may have listeners for them.").

\[2\] In Gecko 22.0 (Firefox 22.0 / Thunderbird 22.0 / SeaMonkey 2.19) the `attributes` property was moved to [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element.").

\[3\] The properties were moved to the [`Element`](/en-US/docs/Web/API/Element "Element is the most general base class from which all objects in a Document inherit. It only has methods and properties common to all kinds of elements. More specific classes inherit from Element.") and [`Attr`](/en-US/docs/Web/API/Attr "This type represents a DOM element's attribute as an object. In most DOM methods, you will probably directly retrieve the attribute as a string (e.g., Element.getAttribute(), but certain functions (e.g., Element.getAttributeNode()) or means of iterating give Attr types.") APIs according to the DOM4 standard.

## Document Tags and Contributors

**Tags:** 

*   [API](/en-US/docs/tag/API)
*   [DOM](/en-US/docs/tag/DOM)
*   [DOM Reference](/en-US/docs/tag/DOM%20Reference)
*   [Interface](/en-US/docs/tag/Interface)
*   [Node](/en-US/docs/tag/Node)
*   [Reference](/en-US/docs/tag/Reference)

**Last updated by:** [ExE_Boss](/en-US/profiles/ExE_Boss), Mar 8, 2018, 11:27:56 AM
