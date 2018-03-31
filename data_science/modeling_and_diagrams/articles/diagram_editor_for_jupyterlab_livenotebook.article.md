https://blog.jupyter.org/a-diagram-editor-for-jupyterlab-a254121ff919

A Diagram Editor for JupyterLab
With the success of the notebook file format as a medium for communicating scientific results, more than an interactive development environment, Jupyter is turning into an interactive scientific authoring environment.


The new JupyterLab interface is much more than a replacement for the classic notebook. It aims to bring together all the pieces required for a complete scientific workflow. The extension-based architecture of JupyterLab comes with a number of components already enabled:

- a Jupyter notebook,
- a text editor,
- na file browser in the sidebar,
- a number of editors and viewers for various file formats,

and much more. However, some pieces are still missing to complete the picture for a scientific authoring environment. One would be a featureful LaTeX editor. The first LaTeX editor for JupyterLab is a step in the right direction and offers an easy way to live-compile tex documents. Another piece is - of course - a means to produce diagrams, flow charts and draw figures!
Drawing charts and diagrams

On the occasion of the Paris Jupyter Widgets workshop, I started working on a feature to fill that gap and built a JupyterLab extension for the Draw.io diagram editor.

Draw.io is a diagram editor that runs in the web browser and is Apache 2.0 licensed. It’s got a really mature code base, which has been around for many years. However, unlike the other components used by JupyterLab, Draw.io has not yet embraced the new JavaScript packaging tooling such as NPM, which complicated the integration with JupyterLab a little bit, but it all paid off eventually!

Now, I am really pleased to announce the first release of the draw.io extension, a fully fledged integration for JupyterLab of the fully-fledged diagram editor!

```
<iframe width="560" height="315" src="https://www.youtube.com/embed/CJH34I01cKA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
```


The Draw.io JupyterLab extension takes advantages of the JupyterLab architecture: i.e. registering a new mime type (.dio) with the file explorer to open files, and adding a launcher button and menu items. Besides that, multiple synchronized views of the same diagrams can be displayed at the same time, allowing a user to visualize the same content with different zoom levels, or with a bare text editor.



Installation

You can install the jupyterlab-drawio extension with the following command:

jupyter labextension install jupyterlab-drawio

This should set up the extension inside your JupyterLab environment. I hope this will be a useful extension for the larger community. All the code is available on GitHub: https://github.com/QuantStack/jupyterlab-drawio. Don’t hesitate to open issues and come contribute to jupyterlab-drawio.
The future

There are other projects just waiting to be packaged for use inside of JupyterLab: one great webapp for JupyterLab would probably be the ShareLaTeX application, which is Open Source as well and provides a very nicely integrated editing experience for LaTeX documents, with autocomplete of LaTeX commands and reference search. Eventually, we might be able to integrate with the official ShareLaTeX server for a collaborative, hosted, editing experience for LaTeX documents from inside JupyterLab.

Maybe we as a community can come together and start building integrations for these amazing free tools into JupyterLab!

To conclude, thanks to all who’ve organized and participated in the workshop (especially Sylvain for the organization). I’ve used the opportunity to chat with the core developers and get their helpful input: Steven, Afshin, and Jason, thanks for helping me out in getting this off the ground and making JupyterLab! And honestly, the biggest shoutout has to go to the people who’ve worked on improving draw.io and thankfully open sourced this amazing code base: the entire draw.io team.
