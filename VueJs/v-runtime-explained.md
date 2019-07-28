
https://alligator.io/vuejs/v-runtime-template/

# Compile Vue.js templates on the Fly with v-runtime-template ← Alligator.io

---------------------------
# Compile Vue.js templates on the Fly with v-runtime-template

[Alex Jover Morales](/author/alex-jover-morales)

I recently released [v-runtime-template](https://github.com/alexjoverm/v-runtime-template), a Vue component that makes it easy to compile and interpret a Vue.js template at runtime by using a `v-html`-like API.

I had a problem in a project where I had to receive a template from the server. Why you say? Well, imagine the usual drag ‘n drop interface that lets the user build some kind of interface. That gets saved as Vue template code that uses components implemented on the frontend. The frontend makes an API call to access that content later to fill a section of a page.

You’ve probably done that with plain HTML using `v-html`. Let’s see an example so it’s easier to understand.

#### 🐊 Alligator.io recommends ⤵

[Dynamic Forms with Vue.js from Vue School](https://vueschool.io/courses/dynamic-forms-vuejs?friend=alligator)

ⓘ [About this affiliate link](/about-sponsored-or-affiliate/)

## [](#injecting-plain-html-with-v-html)Injecting Plain HTML with v-html

Using `v-html` you can inject HTML in any DOM element on the fly:

```
<template>
  <div>
    <div  v-html="template"></div>
  </div>
</template>

<script>  export  default  {  data:  ()  =>  ({  template:  `
      <h2>Howdy Yo!</h2>
      <a href="croco-fantasy">Go to the croco-fantasy</a>
    `  }),  };  </script>
```

Alright, that seems pretty legit. The `template` string could perfectly come from a server Ajax call. The thing is, what if we want the template to have some Vue template code?

```
export default {
  data: ()  => ({
    template: `
      <app-title>Howdy Yo!</app-title>
      <vue-router to="/croco-fantasy">Go to the croco-fantasy</vue-router>
    `
  }),
};
```

`v-html` will interpret that template as just plain HTML, and those tags don’t exist in HTML.

## [](#enter-v-runtime-template)Enter v-runtime-template

That’s where `v-runtime-template` comes into play. It offers a similar API to `v-html` but it does interpret specific Vue template code.

`v-runtime-template` automatically gets the context of the parent component where it’s used and then it uses a dynamic component to let Vue compile and attach, as you can see in [in the code’s render function](https://github.com/alexjoverm/v-runtime-template/blob/master/index.js#L34-L53).

To make the previous code work, you just need to use `v-runtime-template` passing the template prop as follows:

```
<template>
  <div>
    <v-runtime-template  :template="template"/>
  </div>
</template>

<script>  import  VRuntimeTemplate  from  "v-runtime-template";  export  default  {  data:  ()  =>  ({  template:  `
      <app-title>Howdy Yo!</app-title>
      <vue-router to="/croco-fantasy">Go to the croco-fantasy</vue-router>
    `  }),  };  </script>
```

Keep in mind that when using `v-runtime-template` you still have the same rules as if you use that template as part of your component. In this case, either `app-title` or `vue-router` must be registered globally or added to the component:

```
import VRuntimeTemplate from "v-runtime-template";
import AppTitle from "./AppTitle";

export default {
  data: () => ({
    template: ` Howdy Yo!  Go to the croco-fantasy `
  }),
  components: {
    AppTitle
  }
};
```

## [](#accessing-the-parent-scope)Accessing the Parent Scope

A cool thing about `v-runtime-template` is that it can access the parent’s scope, meaning whatever is accessible through its `data`, `props`, `computed` or `methods`. You can therefore have dynamic templates that have reactive data accessible from a parent.

For example, the following template can access `animal`:

```
export default {
  data: ()  => ({
    animal: "Crocodile",
    template: `
      <app-title>Howdy {{animal}}!</app-title>
    `
  })
  // ...
```

Or call a method:

```
export default {
  data: ()  => ({
    animal: "Crocodile",
    template: `
      <app-title>Howdy {{animal}}!</app-title>
      <button @click="goToCrocoland">Go to crocoland</button>
    `
  }),
  methods: {
    goToCrocoland() {
      // ...
    }
  }
  // ...
```

Your strings or server templates have never been more connected to your application!

## [](#wrapping-up)Wrapping Up

`v-runtime-template` was made to easily solve, using a `v-html`-like syntax, the issue of interpreting templates on the fly for cases like templates coming from a server; where they are received at runtime.

If you need more info, you can check the official [demo](https://codesandbox.io/s/884v9kq790) or [repository](https://github.com/alexjoverm/v-runtime-template). Feel free to leave your feedback over there!

Published: May 16, 2018


---


``
Injecting Plain HTML with v-html
```
```
Using v-html you can inject HTML in any DOM element on the fly:
```
```
<template>
  <div>
    <div v-html="template"></div>
  </div>
</template>

<script>
export default {
  data: () => ({
    template: `
      <h2>Howdy Yo!</h2>
      <a href="croco-fantasy">Go to the croco-fantasy</a>
    `
  }),
};
</script>

```
```
Alright, that seems pretty legit. The template string could perfectly come from a server Ajax call. The thing is, what if we want the template to have some Vue template code?
```
```
export default {
  data: () => ({
    template: `
      <app-title>Howdy Yo!</app-title>
      <vue-router to="/croco-fantasy">Go to the croco-fantasy</vue-router>
    `
  }),
};

```
```
v-html will interpret that template as just plain HTML, and those tags don’t exist in HTML.
```
```
Enter v-runtime-template
```
```
That’s where v-runtime-template comes into play. It offers a similar API to v-html but it does interpret specific Vue template code.
```
```
v-runtime-template automatically gets the context of the parent component where it’s used and then it uses a dynamic component to let Vue compile and attach, as you can see in in the code’s render function.
```
```
To make the previous code work, you just need to use v-runtime-template passing the template prop as follows:
```
```
<template>
  <div>
    <v-runtime-template :template="template"/>
  </div>
</template>

<script>
import VRuntimeTemplate from "v-runtime-template";

export default {
  data: () => ({
    template: `
      <app-title>Howdy Yo!</app-title>
      <vue-router to="/croco-fantasy">Go to the croco-fantasy</vue-router>
    `
  }),
};
</script>

```
```
Keep in mind that when using v-runtime-template you still have the same rules as if you use that template as part of your component. In this case, either app-title or vue-router must be registered globally or added to the component:
```
```
import VRuntimeTemplate from "v-runtime-template";
import AppTitle from "./AppTitle";

export default {
  data: () => ({
    template: `
      Howdy Yo!
      Go to the croco-fantasy
    `
  }),
  components: {
    AppTitle
  }
};

```
```
Accessing the Parent Scope
```
```
A cool thing about v-runtime-template is that it can access the parent’s scope, meaning whatever is accessible through its data, props, computed or methods. You can therefore have dynamic templates that have reactive data accessible from a parent.
```
```
For example, the following template can access animal:
```
```
export default {
  data: () => ({
    animal: "Crocodile",
    template: `
      <app-title>Howdy {{animal}}!</app-title>
    `
  })
  // ...

```
```
Or call a method:
```
```
export default {
  data: () => ({
    animal: "Crocodile",
    template: `
      <app-title>Howdy {{animal}}!</app-title>
      <button @click="goToCrocoland">Go to crocoland</button>
    `
  }),
  methods: {
    goToCrocoland() {
      // ...
    }
  }
  // ...

```
```
Your strings or server templates have never been more connected to your application!
```
```
Wrapping Up
```
```
v-runtime-template was made to easily solve, using a v-html-like syntax, the issue of interpreting templates on the fly for cases like templates coming from a server; where they are received at runtime.
```

