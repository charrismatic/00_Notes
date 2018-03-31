---
Tags: boostnote, markdown, sync
author: Junpei Shimotsu
Published: "February 1, 2018"	
---

[Boostlog](https://boostlog.io/) - Powered by BoostNote

[Boost your productivity using Markdown](https://boostlog.io/boostio/boost-your-productivity-using-markdown-5a71fc1152b91d9de6d0bd64)

# Boost your productivity using Markdown. 


### by Junpei Shimotsu

Markdown makes it easy to organize information.

What’s Markdown?
----------------

> Markdown is a lightweight markup language with plain text formatting syntax. It is designed so that it can be converted to HTML and many other formats using a tool by the same name. from [Wikipedia](https://en.wikipedia.org/wiki/Markdown)

Introducing the markdown formatting.


1\. Heading
-----------

    # h1
    ## h2
    ### h3
    standard


# h1
## h2
### h3
standard


2\. Emphasis
------------
```
    *Italic type*
    **Bold**
    ~~Negative~~
```

*Italic type* 
**Bold** 
~~Negative~~ 



3\. Fold
------

Fold the long sentences.

```
<details><summary>Boostnote is a notepad corresponding to markdown notation, which is a tool for organizing and sharing information.</summary>
- Features  <br>
- Search function to find memos in one shot
- Supports markdown notation <br>
- Support for Mac, Windows, Linux, iOS, Android <br>
- Export and import to Plain text (.txt), Markdown (.md) format <br>
- Supports PDF saving <br>
- Can be used offline <br>
- Synchronize to dropbox etc. with setting <br>
- Supports theme colors and numerous fonts <br>
</details>
```

![image3](https://cdn-images-1.medium.com/max/1600/1*xseR8KIFAlMdzm1KCzDBRA.png)

![image4](https://cdn-images-1.medium.com/max/1600/1*-BhCBzpUh7Y2RyJ7ft3teA.png)


4\. List
--------

    - List 1
    - List 2
    * List 3

- List 1
- List 2
* List 3


5\. Link
--------

Put a text on the left and a url on the right.

    [Boostnote](https://boostnote.io)


![image6](https://cdn-images-1.medium.com/max/1600/1*Mny3fHMwmzcr9QBbWI_ICQ.png)

6\. Check box
-------------

    - [ ] - [x] Task 1
    - [ ] Task 2


![image7](https://cdn-images-1.medium.com/max/1600/1*oF9MYKbEXvetE8GQOFndVg.png)

7\. Quotation
-------------

    > Quotation
    > Quotation Quotation


![image8](https://cdn-images-1.medium.com/max/1600/1*hcbaJni5cTecU1fktr-7aQ.png)

8\. Horizontal line
-------------------

Horizontal lines have various ways of writing.

* * *
***
---

```
* * *
***
---
```


![image9](https://cdn-images-1.medium.com/max/1600/1*AnbgzuWHhCzXAs2bo_O9Zw.png)

9\. Image
---------
https://www.reddit.com/r/nononono/
Put the title of the picture on the left and write the saved place on the right.

![Image title](https://boostnote.io/assets/img/logo.png)

![image10](https://cdn-images-1.medium.com/max/1600/1*lE0739to8zaMPCALgULv_w.png)

10\. Source code
----------------

```javascript
Render: function () {
  Return (
    <Div className = “commentBox”>
      <H1> Comments </ h1>
      <CommentList data = {this.state.data} />
      <CommentForm onCommentSubmit = {this.handleCommentSubmit} />
    </Div>
  );
}
```


11\. Table
----------

| Fruits | Price |
|:--|:--|
| Apple | 1$ |
| Grapes | 4$ |
| Orange | 2$ |
| Lemon | 1$ |
| Peach | 3$ |
| Melon | 20$ |

* * *

These are the basic markdown formatting.

In addition to above, you can also complex formatting like following in [Boostnote](https://boostnote.io).

12.Latex
--------

Mathematical formatting.

$$
\mathrm{e}^{\mathrm{i}\theta} = \cos(\theta) + \mathrm{i}\sin(\theta)
$$



Flowchart
---------

```flow
st=>start: Start:>http://www.google.com[blank]
e=>end:>http://www.google.com
op1=>operation: My Operation
sub1=>subroutine: My Subroutine
cond=>condition: Yes or No?:>http://www.google.com
io=>inputoutput: catch something…
st->op1->cond
cond(yes)->io->e
cond(no)->sub1(right)->op1
```


Sequence
--------

```sequence
Title: Here is a title
A-> B: Normal line
B -> C: Dashed line
C -> D: Open arrow
D -> A: Dashed open arrow
```
