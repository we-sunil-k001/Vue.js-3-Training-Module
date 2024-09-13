/===========================================
1. Introduction
/===========================================
Vue.js 3 is a progressive JavaScript framework used for building user interfaces and single-page applications (SPAs).
It’s designed to be incrementally adoptable, meaning you can use as much or as little of it as you need.

Features:
- The composition API
- Multiple root elements
- Teleport Components
- Suspense components
- Typescript support

OPtions API:
composition API:



/===========================================
2. install vue project:
/===========================================

    (i) npm init vue@latest
    (ii) npm install

    When using Vue.js with CDN links, you don’t need a build tool or development server to run your app. You can simply open your HTML file in a web browser, and it will run directly.

    However, if you're working with a more complex Vue.js project (e.g., using Vue CLI or Vite), you would typically use a command-line interface (CLI) tool to run your Vue app. Here’s a quick overview of how to do it with different tools:

        ### Using Vue CLI

        1. **Install Vue CLI** (if not already installed):
            ```bash
            npm install -g @vue/cli
            ```

            2. **Create a new Vue project**:
            ```bash
            vue create my-project
            ```
            Follow the prompts to set up your project.

            3. **Navigate to the project directory**:
            ```bash
            cd my-project
            ```

            4. **Run the development server**:
            ```bash
            npm run serve
            ```
        This will start a development server, and you can view your app by going to `http://localhost:8080` in your web browser.

        ### Using Vite

            1. **Install Vite** (if not already installed):
                ```bash
                npm create vite@latest
                ```

            2. **Follow the prompts** to set up your project.

            3. **Navigate to the project directory**:
                ```bash
                cd your-project-name
                ```

            4. **Install dependencies**:

                ```bash
                npm install
                ```

            5. **Run the development server**:
            ```bash
            npm run dev
        ```
        This will start a development server, and you can view your app by going to `http://localhost:5173` (or a different port if specified) in your web browser.




/===========================================
4. Why use Vue framework over Vanilla js
/===========================================

    Let's break down Vue.js concepts by comparing them to the things you already know from vanilla JavaScript and HTML. This
    will help you understand how Vue simplifies some of the processes.

    ### 1. **DOM Manipulation**
    - **In Vanilla JavaScript**: You often use `document.getElementById()` or `document.querySelector()` to find elements in
    the DOM, and then you modify them manually.
    ```js
    document.getElementById('message').textContent = 'Hello World!';
    ```

    - **In Vue**: You don't need to manually search for elements or update them. Vue automatically tracks changes to data
    and updates the DOM for you.
    ```js
    const app = Vue.createApp({
    data() {
    return { message: 'Hello World!' };
    }
    }).mount('#app');
    ```
    Now, Vue will automatically update the DOM when `message` changes, and you don't need to find the element manually.

    ---

    ### 2. **Binding Data to HTML**
    - **In HTML**: If you wanted to dynamically display data, you’d manually insert the content:
    ```html
    <div id="app">Hello World!</div>
    ```

    - **In Vue**: You use **templating**. Vue automatically binds data to the HTML using `{{ }}` for displaying variables.
    ```html
    <div id="app">{{ message }}</div>
    ```

    If `message` changes in Vue, the text in the `div` updates automatically.

    ---

    ### 3. **Event Handling**
    - **In JavaScript**: You often use `addEventListener` to attach events to elements.
    ```js
    document.getElementById('button').addEventListener('click', function() {
    alert('Button clicked!');
    });
    ```

    - **In Vue**: You handle events directly in the template using `@event`:
    ```html
    <button @click="alertMessage">Click me</button>
    ```

    In the Vue app, you define the `alertMessage` method:
    ```js
    const app = Vue.createApp({
    methods: {
    alertMessage() {
    alert('Button clicked!');
    }
    }
    }).mount('#app');
    ```

    ---

    ### 4. **State Management**
    - **In Vanilla JavaScript**: You manually keep track of variables and update the DOM when they change.
    ```js
    let count = 0;
    document.getElementById('counter').textContent = count;

    function increment() {
    count++;
    document.getElementById('counter').textContent = count;
    }
    ```

    - **In Vue**: Vue automatically handles the connection between your data and the DOM. When the data changes, the DOM
    updates by itself.
    ```html
    <div id="app">
        <p>{{ count }}</p>
        <button @click="count++">Increment</button>
    </div>
    ```

    In Vue, you don't need to manually update the `textContent`. If `count` changes, Vue will update the display
    automatically.

    ---

    ### 5. **Conditionally Rendering Elements**
    - **In Vanilla JavaScript**: You would use `if` conditions or hide/show elements by manipulating `style.display` or
    `classList`.
    ```js
    let isVisible = true;
    const element = document.getElementById('myElement');

    if (isVisible) {
    element.style.display = 'block';
    } else {
    element.style.display = 'none';
    }
    ```

    - **In Vue**: You can use the `v-if` directive to conditionally render elements.
    ```html
    <div v-if="isVisible">This element is visible</div>
    ```
    Vue will automatically show or hide the element based on the `isVisible` data property.

    ---

    ### 6. **Reactivity**
    - **In Vanilla JavaScript**: You manually keep track of changes and update the DOM when something happens.

    For example, updating a list of items:
    ```js
    const list = ['apple', 'banana'];
    function addItem(item) {
    list.push(item);
    updateDOM();
    }
    function updateDOM() {
    document.getElementById('list').innerHTML = '';
    list.forEach(item => {
    const li = document.createElement('li');
    li.textContent = item;
    document.getElementById('list').appendChild(li);
    });
    }
    ```

    - **In Vue**: Vue automatically re-renders the DOM whenever the underlying data changes.
    ```html
    <ul>
        <li v-for="item in list" :key="item">{{ item }}</li>
    </ul>
    ```

    In your Vue instance:
    ```js
    data() {
    return {
    list: ['apple', 'banana']
    };
    },
    methods: {
    addItem(item) {
    this.list.push(item); // Vue automatically updates the DOM
    }
    }
    ```

    ---

    ### 7. **Component-Based Architecture**
    - **In Vanilla JavaScript and HTML**: You usually split your app into separate HTML, CSS, and JS files. If you want
    reusable sections of UI, you copy-paste code or create functions.

    - **In Vue**: Vue encourages building apps with **components**, small, self-contained parts of your UI that can be
    reused. You define them once and use them wherever needed:
    ```html
    <my-component></my-component>
    ```

    Components encapsulate HTML, CSS, and JS logic, making your code easier to manage and reuse.

    ---

    ### Summary:
    - **Vue automates a lot of manual DOM manipulations** you’d do with vanilla JS, like updating text or handling events.
    - **It binds data and templates** together so you don’t need to keep track of changes manually.
    - **It uses directives** like `v-if`, `v-for`, and `v-bind` to simplify conditional rendering, lists, and binding data
    to attributes.
    - **Components** let you break your app into manageable pieces for reuse.

    By using Vue, you reduce the need for boilerplate code, allowing you to focus on the functionality rather than manually
    updating the DOM.


/*================================================================
5. Understanding Application Instance (basic of Vue 3):
/*================================================================

    In Vue.js, an **application instance** is the root object that ties together the entire Vue app. When you create a Vue
    app, you instantiate an application instance using `Vue.createApp()` in Vue 3. This instance provides the context in
    which the app operates, managing data, components, directives, and global configurations.

    ### Key Concepts of a Vue Application Instance:

    1. **Creating the Instance**:
    In Vue 3, you create an app instance using `Vue.createApp()`. This is the starting point for any Vue app.
    ```js
    const app = Vue.createApp({
    // Options go here
    });
    ```

    - The object passed to `createApp` is called the **root component**. It defines how your application will behave,
    including data, methods, computed properties, lifecycle hooks, and components.

    2. **Mounting the App**:
    After creating the instance, it needs to be **mounted** to a DOM element, which is where Vue will control the content.
    This is done with `.mount()`:

    ```js
    app.mount('#app'); // 'app' is the id of a DOM element where Vue will take control
    ```

    Vue will then compile the template and render the content within the specified DOM element.

    3. **Options API** (Defining the App's Behavior):
    You define various options inside the `createApp()` object. Some common options include:

    - **`data`**: Defines the reactive state of your app. These are the variables you want to track and bind to the DOM.
    ```js
    data() {
    return {
    message: 'Hello Vue!'
    };
    }
    ```

    - **`methods`**: Contains functions that define behavior and can manipulate the app’s state.
    ```js
    methods: {
    sayHello() {
    alert(this.message);
    }
    }
    ```

    - **`components`**: Register child components that can be reused within the app.
    ```js
    components: {
    'my-component': MyComponent
    }
    ```

    - **`computed`**: Functions that return derived state based on reactive data. They automatically update when
    dependencies change.
    ```js
    computed: {
    reversedMessage() {
    return this.message.split('').reverse().join('');
    }
    }
    ```

    4. **Global Methods/Properties**:
    You can configure global properties or methods on the app instance that will be available across all components. This is
    useful for setting global configurations or injecting services.

    ```js
    app.config.globalProperties.$appName = 'My Vue App'; // Global property
    ```

    5. **Reactivity**:
    The `data()` method in the app instance returns a reactive object. Vue tracks changes to these properties, updating the
    DOM when the values change.

    6. **Lifecycle Hooks**:
    The application instance has lifecycle hooks like `created()`, `mounted()`, `updated()`, and `destroyed()` that allow
    you to run code at different stages of the app's lifecycle.

    ```js
    created() {
    console.log('App created!');
    }
    ```

    ### Example of an Application Instance:

    ```js
    const app = Vue.createApp({
    data() {
    return {
    message: 'Hello from Vue.js 3'
    };
    },
    methods: {
    changeMessage() {
    this.message = 'Message changed!';
    }
    },
    created() {
    console.log('App is created!');
    }
    });

    app.mount('#app');
    ```

    In this example:
    - `data()` provides the reactive `message`.
    - `methods` contain a method to change the message.
    - The `created()` lifecycle hook logs a message when the app is created.
    - The app is mounted to a DOM element with the id `app`.

    ### Summary of Application Instance Functions:
    - **`createApp()`**: Initializes the application instance.
    - **`mount()`**: Connects the app to a DOM element.
    - **`data()`**: Defines the reactive state.
    - **`methods`**: Functions that manipulate data and respond to events.
    - **`components`**: Registers reusable child components.
    - **`computed`**: Defines computed properties based on reactive data.
    - **Lifecycle hooks**: Run functions at different stages of the app lifecycle.

    The Vue application instance is central to managing the state, behavior, and structure of your app.

/*==========================================================
6. File Structure of vue
/*==========================================================

    Understanding the file structure of a Vue.js project can help you manage and organize your code more efficiently. Here’s
    a typical file structure for a Vue.js project created with Vue CLI:

    ### **Basic Vue.js Project Structure**

    1. **`public/`**:

        - **`index.html`**: The main HTML file that serves as the entry point for your app. It’s where your Vue app is mounted.

        - **`favicon.ico`**: The icon displayed in the browser tab.
        
        - **`assets/`**: Static assets that are directly served without processing (e.g., images, fonts).

    2. **`src/`**:
        - **`main.js`**: The entry point for your Vue application. This file creates the Vue app instance and mounts it to the
            DOM. It also often includes global configurations and imports.

        - **`App.vue`**: The root Vue component. It’s typically used to define the main layout of your application.

        - **`components/`**: Directory for Vue components. Components are reusable pieces of UI. Each component usually has its
            own `.vue` file.

        - **`HelloWorld.vue`**: Example of a simple component.

        - **`views/`**: Directory for Vue components that are used as pages or views in your app. Typically used with Vue
        Router.
            - **`router/`**: Contains the configuration for Vue Router if you're using routing in your app.
            - **`index.js`**: Defines the routes and links them to views/components.
            - **`store/`**: Contains the state management setup using Vuex, if you're using it for state management.
            - **`index.js`**: Defines the Vuex store, including state, mutations, actions, and getters.
            - **`assets/`**: Directory for other assets such as CSS files, images, or other files that need to be processed by
        Webpack.
            - **`styles/`**: Contains global styles or CSS files used across the application.

    3. **`tests/`**:
        - **`unit/`**: Contains unit tests for individual components.
        - **`e2e/`**: Contains end-to-end tests for testing the application as a whole.

    4. **`node_modules/`**:
        - Directory where npm installs project dependencies. It's not included in version control and is managed automatically
        by npm.

    5. **`package.json`**:
        - Manages project metadata and dependencies. It also includes scripts for common tasks (e.g., start, build, test).

    6. **`package-lock.json`**:
        - Locks the versions of dependencies to ensure consistent installs across environments.

    7. **`vue.config.js`** (optional):
        - Configuration file for customizing Vue CLI settings, such as configuring the development server or modifying Webpack
        settings.

    ### **Example File Structure**

    ```
    my-vue-project/
    ├── public/
    │ ├── favicon.ico
    │ ├── index.html
    │ └── assets/
    │ └── logo.png
    ├── src/
    │ ├── assets/
    │ │ └── global.css
    │ ├── components/
    │ │ ├── HelloWorld.vue
    │ │ └── AnotherComponent.vue
    │ ├── views/
    │ │ ├── Home.vue
    │ │ └── About.vue
    │ ├── router/
    │ │ └── index.js
    │ ├── store/
    │ │ └── index.js
    │ ├── App.vue
    │ ├── main.js
    │ └── styles/
    │ └── main.scss
    ├── tests/
    │ ├── unit/
    │ └── e2e/
    ├── node_modules/
    ├── package.json
    ├── package-lock.json
    └── vue.config.js
    ```

    ### **Summary**

    - **`public/`**: Static files served directly.
    - **`src/`**: Main source code directory including components, views, router, store, and assets.
    - **`tests/`**: Directory for tests.
    - **`node_modules/`**: Dependencies.
    - **`package.json`**: Project metadata and dependencies.
    - **`vue.config.js`**: Optional configuration file for Vue CLI.

    This structure helps in organizing your Vue application by separating concerns, making it easier to maintain and scale.


/===============================================================
7. Options API and Composition API
/=============================================================

    In Vue.js, there are two main ways to define and organize the logic in your components: **Options API** and
    **Composition API**. Both have their own syntax and use cases, but they serve the same purpose of building and managing
    Vue components.

    ### **Options API**

    **Options API** is the traditional way of defining Vue components. It organizes the component’s logic by options like
    `data`, `methods`, `computed`, and `props`. This approach is straightforward and often preferred for simpler
    applications or for developers familiar with earlier versions of Vue.

    #### **Structure**

    Here’s a basic example of a component using the Options API:

    ```js
    // HelloWorld.vue
    <template>
        <div>
            <p>{{ message }}</p>
            <button @click="increment">Increment</button>
        </div>
    </template>

    <script>
        export default {
            data() {
                return {
                    message: 'Hello, World!',
                    count: 0
                };
            },
            methods: {
                increment() {
                    this.count++;
                    this.message = `Count is ${this.count}`;
                }
            }
        };
    </script>

    <style>
        /* Component-specific styles */
    </style>
    ```

    #### **Key Points:**
    - **`data`**: Defines the component’s reactive state.
    - **`methods`**: Contains functions that can be used in the template or for component logic.
    - **`computed`**: Defines properties that depend on reactive data and are updated automatically.
    - **`watch`**: Allows you to react to changes in data.


    ### **Composition API**

    **Composition API** is a newer approach introduced in Vue 3 that allows for a more flexible and modular way to manage
    component logic. It’s particularly useful for larger components or when you need to reuse logic across multiple
    components. It provides a way to organize code by logical concerns rather than by options.

    #### **Structure**

    Here’s how you would write a similar component using the Composition API:

    ```js
    // HelloWorld.vue
    <template>
        <div>
            <p>{{ message }}</p>
            <button @click="increment">Increment</button>
        </div>
    </template>

    <script>
        import {
            ref
        } from 'vue';

        export default {
            setup() {
                const message = ref('Hello, World!');
                const count = ref(0);

                const increment = () => {
                    count.value++;
                    message.value = `Count is ${count.value}`;
                };

                return {
                    message,
                    count,
                    increment
                };
            }
        };
    </script>

    <style>
        /* Component-specific styles */
    </style>
    ```

    #### **Key Points:**
    - **`setup()`**: The entry point for Composition API logic. It runs before the component is created and is where you
    define reactive state, computed properties, and methods.
    - **`ref()`**: Creates reactive references to values. These are used to create reactive state variables.
    - **`reactive()`**: Creates a reactive object (alternative to `ref()` for objects).
    - **`computed()`**: Defines computed properties similar to the Options API.
    - **`watch()`**: Similar to Options API, but used in the `setup` function.

    ### **Comparison**

    1. **Code Organization:**
    - **Options API**: Organizes code by options (`data`, `methods`, `computed`).
    - **Composition API**: Organizes code by logical concerns in the `setup` function.

    2. **Reusability:**
    - **Options API**: Reuse logic using mixins or extends, but can become cumbersome.
    - **Composition API**: Makes it easier to extract and reuse logic through composition functions.

    3. **TypeScript Support:**
    - **Options API**: TypeScript integration can be more cumbersome.
    - **Composition API**: Provides better TypeScript support with improved type inference.

    4. **Complexity:**
    - **Options API**: Simple and easier to understand for smaller projects or beginners.
    - **Composition API**: Offers more flexibility and scalability for larger or complex components.

    In summary, the Options API is a straightforward and familiar way to write Vue components, while the Composition API
    provides a more modular and scalable approach, especially beneficial for complex applications or when using TypeScript.


/=======================================================

8.  
    - ref(): used for reactive values
    - reactive(): used for reactive object (alternative to `ref()` for objects).


9.  <!-- ========================================== -->
    <!-- Using Composition API -->
    <!-- ========================================= -->

    <script setup>

        import {ref} from 'vue';    //import ref

        const counter = ref(0);     // ref for reactive variable - imp. to import first

        function decrementCounter(){
            counter.value--;
        }

        function indcrementCounter(){
            counter.value++;
        }

        //-- writing funtion is optional can also write
        
        const decrementCounter =()=>{
            counter.value--;
        }

        const indcrementCounter =()=>{
            counter.value++;
        }



        //--------------------------------------
        //  If do not use <script setup>
        //-----------------------------------------

        // export default{
        //     setup(){
        //         const counter = ref(0);

        //         function decrementCounter(){
        //             counter.value--;
        //         }

        //         function indcrementCounter(){
        //             counter.value++;
        //         }

        //         return{
        //             counter,
        //             decrementCounter,
        //             indcrementCounter
        //         };
        //     }
        // };

    </script>

10. If you add "scoper" with style like <style scoped>, so the css will only be applied to that component or page only, it won't effect other pages.
    componenet > counter.vue

    <style scoped>

        h2{
            color: red;
            font-weight: bold;
        }
    </style>

11. Interpolation of data:

    - example1.     <template>
                        <h2>Hello World {{"sunil kumar".length}}</h2>       <!--  {{"sunil kumar".length}}  : Interpolation of data  -->
                        <div><counter></counter></div>
                    </template>


    -   example2.  <div id="app">
                        <p>{{ message }}</p>
                    </div>

                    <script src="https://unpkg.com/vue@3"></script>
                    <script>
                        const app = Vue.createApp({
                            data() {
                            return {
                                message: 'Hello, Vue.js!'
                            };
                            }
                        });

                        app.mount('#app');
                    </script>

12. Default main.js - at the time of installation

    import './assets/main.css'

    import { createApp } from 'vue'
    import App from './App.vue'

    createApp(App).mount('#app')



13. const counter = ref('hello');
    const counter = 'hello';
    Diff. in above and why use ref?

    1. const counter = ref('hello');
        This line uses Vue's ref function, part of the Composition API. The ref function is used to create reactive variables. In this case, counter is a reactive reference to the value 'hello'.

        Reactivity: When the value of counter is updated (e.g., counter.value = 'world';), Vue will automatically track the change and update any UI elements that depend on counter.
        Accessing the value: You have to use counter.value to access or modify the value.
        eg:- 
            const counter = ref('hello'); // Creates a reactive reference
            console.log(counter.value); // 'hello'
            counter.value = 'world'; // Updates the reactive value
            console.log(counter.value); // 'world'

    2. 2. const counter = 'hello';
        This is a normal JavaScript variable declaration where counter is just a simple string variable holding the value 'hello'.

        No reactivity: The value of counter is not tracked by Vue, and updating it manually will not trigger any DOM updates or reactive system responses in Vue.
        Direct access: You can directly access the value without .value.

14. Computed Components:

    computed properties are used to define reactive, derived values that are automatically re-calculated when their dependencies change. They are cached and only re-evaluated when their dependencies update, making them efficient for expensive operations.

    Key Points:
        Purpose: To compute values based on other reactive data.
        Caching: Computed properties are cached, meaning they won't re-run unless their dependencies change.
        Reactivity: If a reactive value changes, the computed property will automatically update.

    <li>Is Employee present: {{ isEmpPresent }}</li>

    <script setup>
        import {computed, reactive} from 'vue';

        const employees = reactive(['emp1', 'emp2']);

        const isEmpPresent = computed(()=>{
            return employees.length ? 'Yes Present' : 'No';
        });
    </script>

15. Vue uses camel case as well as smallcase (Traditional) one for css:

        color: 'green',
        fontSize: '30px',
        fontWeight: 'bold',

            OR

        color: 'green',
        font-size: '30px',
        font-weight: 'bold',


16. Computed Syntax:

    const Activecolor = ref('red');
    const fontSize = ref('28px');

    const ComputedstyleObject = reactive(()=>{
        return{
            color: Activecolor,
            fontSize: '30px',
            fontWeight: 'bold',
        }
    });


    Using Computed you also can change the value        --IMp.

    const ComputedstyleObject = computed(()=>{
        return{
            color: Activecolor.value,
            fontSize: fontSize.value,
            fontWeight: 'bold'
        };
    });

    setTimeout(()=>{
        Activecolor.value = 'blue';
    },5000);


17. Pass Object in Html as class/ style, etc:

    <li><h3 :style="[baseStyle, baseStyle2]">Applyign Styles - multiple styles</h3></li>


18. Syntax of reactive:

    const baseStyle = reactive({
        color: "orange",
        fontSize: '24px'
    });

    const baseStyle2 = reactive({
        color: "skyblue",
        fontSize: '24px'
    });


19. Simple TOggle for IF else

    <template>
        <ol>
            <li>
                <button @click="$event => isAwesome = !isAwesome">Toggle</button>
                <div v-if="isAwesome">Vue is Awsome!!</div>
                <div v-else>Vue is Boring!!</div>
            </li> 
        </ol>
    </template>

    <script setup>
        import {ref} from 'vue';

        const awesome = ref(true);
        const isAwesome = ref(true);
    </script>


20. 
<button v-on:click="increamentCounter++">"v-on" Click event</button>
<div>Counter : {{count}}</div>

<script setup>
    import {ref} from 'vue';

    const increamentCounter = ()=>{
        count.value++;
    }
</script>

21. 
    <a href="http://google.com" @click="onLinkClick">Link click event</a>

    <script setup>
    const onLinkClick = (event)=>{
        event.preventDefault();
        console.log("Link clicked");
    }
    <script setup>

        OR 

    <a href="http://google.com" @click.stop.prevent="onLinkClick">Link click event</a>      //IMP. - Vue feature


    Note: (event) is by default 

21. Capture

        <div @click.capture="onParentClick">
            <a href="http://google.com" @click.stop.prevent="onLinkClick">Link click event</a>
        </div>

        const onLinkClick = (event)=>{
            event.preventDefault();
            console.log("Link clicked");
        }

        const onParentClick =()=>{
                console.log("Parent Link clicked");
        }

    Here First Parent will fire due to "Capture" then child

22. Checkbox:

    <li>
        <input type="checkbox" v-model="CheckNames" value="Sunil1">&nbsp
        <input type="checkbox" v-model="CheckNames" value="Sunil2">&nbsp
        <input type="checkbox" v-model="CheckNames" value="Sunil3">&nbsp
        <div >{{CheckNames}}</div>
    </li>

    const CheckNames = ref([]);

22. Watchers:

    Computed properties allow us to declaratively compute derived values. However, there are cases where we need to perform "side effects" in reaction to 
    state changes - for example, mutating the DOM, or changing another piece of state based on the result of an async operation.

    With Composition API, we can use the watch function to trigger a callback whenever a piece of reactive state changes:

    In simple terms, a **watcher** in Vue 3 is like a "lookout" that keeps an eye on a specific piece of data in your app. Whenever that data changes, the watcher springs into action and does something based on that change.

        ### Example:
        Imagine you have a form where users can enter their age. You want to display a message that says "You’re eligible to vote!" if the user enters an age of 18 or more. Instead of manually checking the age every time, you can use a watcher to automatically show the message whenever the age changes.

        ### How It Works:
        - The watcher watches the **age**.
        - When the age changes, the watcher notices the change.
        - Based on the new age, it either shows or hides the voting message.

        ### Why Use a Watcher?
        - It’s great when you need to react to changes in data and do something extra, like making an API call, validating input, or updating something on the screen automatically.

23. Lifecycle Hooks

    ### Vue 3 Lifecycle Hooks

    Lifecycle hooks in Vue are special methods that get called at different stages of a component's life — from creation to destruction. Think of them as phases in a component's journey, like being born, growing up, and finally being removed. They help you run custom code at each stage.

    Here's a brief description of key lifecycle hooks with examples.

    ### 1. **`onMounted()`**: 
    Called when the component is first displayed on the screen (after it's fully created).

    - **Use case**: Fetching data when the component is visible.
    
    **Example**:
    ```vue
    <script setup>
    import { onMounted } from 'vue'

    onMounted(() => {
    console.log('Component is now mounted!')
    // Fetch data or run code when component is visible
    })
    </script>
    ```

    ### 2. **`onBeforeMount()`**: 
    Called right before the component is inserted into the DOM (before showing up).

    - **Use case**: Setting things up right before the component appears.
    
    **Example**:
    ```vue
    <script setup>
    import { onBeforeMount } from 'vue'

    onBeforeMount(() => {
    console.log('Component is about to mount!')
    })
    </script>
    ```

    ### 3. **`onUpdated()`**: 
    Called whenever the component's reactive data changes and the view is updated.

    - **Use case**: Doing something when the data changes and the DOM updates.
    
    **Example**:
    ```vue
    <script setup>
    import { onUpdated } from 'vue'

    onUpdated(() => {
    console.log('Component was updated!')
    })
    </script>
    ```

    ### 4. **`onBeforeUnmount()`**: 
    Called right before the component is removed from the DOM.

    - **Use case**: Cleaning up resources, stopping timers, or removing event listeners before the component is destroyed.
    
    **Example**:
    ```vue
    <script setup>
    import { onBeforeUnmount } from 'vue'

    onBeforeUnmount(() => {
    console.log('Component is about to be destroyed!')
    })
    </script>
    ```

    ### 5. **`onUnmounted()`**: 
    Called after the component has been removed from the DOM.

    - **Use case**: Final cleanup, like disconnecting from services or clearing memory.
    
    **Example**:
    ```vue
    <script setup>
    import { onUnmounted } from 'vue'

    onUnmounted(() => {
    console.log('Component has been destroyed!')
    })
    </script>
    ```

    ### Importance of Lifecycle Hooks:

    - **Timing**: They help you execute code at specific moments (like after the component is shown or right before it's removed).
    - **Flexibility**: You can perform tasks like fetching data, cleaning up resources, or interacting with the DOM at just the right time.
    - **Efficiency**: Ensures you only run certain code when needed, helping with performance and memory management.

    Lifecycle hooks are essential for managing the component's behavior and keeping your app efficient!


25. use "ref" instead of class/id
    <input ref="myInput" type="text" placeholder="Type something here" />

    // Create a template ref
    const myInput = ref(null)

    // Ensure ref is available after mounting
    onMounted(() => {
    console.log('Input element:', myInput.value)
    })


26. Pass data from parent to child comp:

    Parentcomp.vue
    <ChildComponent title="Hello world"/>

    child.vue
        <li>
            title reveived from parent comp.: {{title}}
        </li>

        const props = defineProps(['title']);
        console.log(props.title);


27. Comunication b/w child and parent component

        Let's break down the concept of **component events** and **emits** in Vue 3 in a very simple way, starting from scratch.

        ### Imagine a Real-Life Example:
        Think of a **child** who wants to tell their **parent** something. The child **raises their hand** (emits an event) to grab their parent's attention, and then tells them something important. The parent **listens** for when the child raises their hand and then responds.

        In Vue, **components** are like the child and the parent. The **child component** can "raise its hand" by **emitting an event** using `emit`, and the **parent component** is ready to "listen" for the event and do something when it happens.

        ### Vue Component Communication:
        - **Parent Component**: Think of it as the listener, waiting for the child to do something.
        - **Child Component**: It’s the one that can send a message by emitting an event.

        ### Why Do We Use Events?
        In Vue, **data flows from parent to child** using `props`. But, what if the **child** wants to send something back to the **parent**? That's when **custom events** come into play. The child can emit an event, and the parent will listen to it.

        ---

        ### Step-by-Step: How Events Work

        1. **The Child Emits an Event**:
        - The child component says, "Hey parent! I'm done with something, here's my message!"
        
        2. **The Parent Listens**:
        - The parent is like, "Ok, I'm listening. Tell me what happened, and I'll handle it."

        ---

        ### Let's Build a Simple Example:

        #### 1. Child Component (`ChildComponent.vue`):

            <template>
            <div>
                <button @click="sendMessage">Click me to send a message to Parent</button>
            </div>
            </template>

            <script setup>
            // This function allows the child to emit events
            const emit = defineEmits(['sendMessageToParent'])

            // A function that runs when the button is clicked
            const sendMessage = () => {
            emit('sendMessageToParent', 'Hello from Child') // Emit event with a message
            }
            </script>

        **What's happening here?**
        - We have a button in the child component.
        - When the button is clicked, the child **emits** an event called `sendMessageToParent` with a message: `"Hello from Child"`.
        
        Think of this as the child **raising their hand** and sending a message to the parent.

        ---

        #### 2. Parent Component (`ParentComponent.vue`):

            <template>
            <div>
                <h2>Parent Component</h2>
                <!-- Listen for the 'sendMessageToParent' event from the child -->
                <ChildComponent @sendMessageToParent="handleMessage" />
                <p>Message from Child: {{ messageFromChild }}</p>
            </div>
            </template>

            <script setup>
            import { ref } from 'vue'
            import ChildComponent from './ChildComponent.vue'

            // This variable will store the message received from the child
            const messageFromChild = ref('')

            // This function is triggered when the child emits the event
            const handleMessage = (msg) => {
            messageFromChild.value = msg // Update the message from the child
            }
            </script>

        **What's happening here?**
        - The parent component is **listening** for the event `sendMessageToParent` from the child.
        - When the parent **hears** the event, it calls a function `handleMessage` that updates the `messageFromChild` with the message from the child.
        - The parent then displays the message from the child.

        ---

        ### The Big Picture:
        1. **Child**: Emits a custom event (`sendMessageToParent`).
        2. **Parent**: Listens for the event and responds by updating the message on the screen.

        ---

        ### Breaking It Down:
        - **emit**: The child "raises their hand" by calling `emit('eventName', data)` and sending some information to the parent.
        - **@eventName**: The parent listens for this event by using `@eventName="handlerFunction"`.

        ---

        ### Analogy:
        - **Child says**: "Hey parent, I clicked the button!"
        - **Parent hears**: "Oh, the child clicked the button. Let me display the message!"

        ---


28. Component Teleporting:


    In Vue 3, Teleport is a feature that allows you to move (or "teleport") HTML elements from their normal location in the component tree to another part of the DOM.

    Imagine This:
    You have a modal (popup) that normally would be placed deep inside a component tree, but you want it to appear at the very top of the page (outside the component). 
    With Teleport, you can move the modal to the top-level of the DOM while still controlling it from your component.

    Why Use Teleport?
    DOM Organization: Sometimes, certain elements (like modals, tooltips, or dropdowns) need to be outside the normal flow of your app’s HTML structure, 
        but still be controlled from within the component.

    CSS and Z-index Issues: If a modal or dropdown is nested deep in the component tree, it might be affected by parent elements' CSS or z-index. 
        By teleporting it to a different part of the DOM (like the body), you avoid these issues.

    Accessibility: Certain elements, like modals, need to be rendered at specific locations for better accessibility or SEO.

    to Attribute:
        The to attribute tells Vue where to teleport the content. In this example, we are teleporting to body.

        Example:

        <template>
            <div>
                <h3>Main Component</h3>
                <p>This is the main content of the component.</p>

                <!-- Modal that will be teleported to a different part of the DOM -->
                <teleport to="body">
                    <div class="modal">
                        <h4>This is a Teleported Modal</h4>
                        <p>I'm rendered at the top level of the body!</p>
                    </div>
                </teleport>
            </div>
        </template>

        <script setup>
        // Your script setup here (optional)
        </script>

        <style>
        /* Styles for the modal */
        .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        }
        </style>


29. HTTP Requests:

        ### **HTTP Requests Using the Fetch API**

        The Fetch API is a modern way to make HTTP requests in JavaScript. It allows you to interact with servers, retrieve data, and send data using promises. It's more flexible and cleaner than older methods like `XMLHttpRequest`.

        ### **How Does Fetch Work?**

        1. **Basic Syntax**:

        ```javascript
        fetch(url, options)
        ```

            - **url**: The URL you want to send the request to.
            - **options**: An optional object that contains configuration for the request, such as method, headers, body, etc.

        2. **Promise-based**:
        The Fetch API returns a **promise**, which resolves to the `Response` object. You can then use methods like `.json()` or `.text()` to process the response.

        ---

        ### **Example 1: Basic GET Request**
        Fetching data from an API (for example, fetching user data from a public API).

            fetch('https://jsonplaceholder.typicode.com/users')
            .then(response => {
                // Check if the request was successful
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                // Parse the response as JSON
                return response.json();
            })
            .then(data => {
                console.log(data); // Handle the fetched data (an array of users)
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });

        - **Response Object**: The `response` object contains details about the HTTP response, such as status code and headers. We use `response.json()` to extract the data in JSON format.

        ---

        ### **Example 2: POST Request (Sending Data)**
        Making a POST request to send data to the server, such as creating a new user.

        ```javascript
        fetch('https://jsonplaceholder.typicode.com/users', {
        method: 'POST', // Specifies a POST request
        headers: {
            'Content-Type': 'application/json' // Specifies the content type as JSON
        },
        body: JSON.stringify({
            name: 'John Doe',
            email: 'john@example.com'
        }) // Sends data as a JSON string
        })
        .then(response => response.json()) // Process the response
        .then(data => {
            console.log('Success:', data); // Handle the response data
        })
        .catch(error => {
            console.error('Error:', error);
        });
        ```

        - **`body`**: This option specifies the data to send. In this example, the `body` is a JSON object containing user information. We use `JSON.stringify()` to convert the object into a JSON string.

        ---

        ### **Handling Errors**
        By default, Fetch **won’t throw an error** for network-related issues or HTTP errors (like 404 or 500). You need to manually check if the response is successful.

        ```javascript
        fetch('https://jsonplaceholder.typicode.com/users')
        .then(response => {
            if (!response.ok) {
            throw new Error('HTTP error! status: ' + response.status);
            }
            return response.json();
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
        ```

        ### **Common Methods & Options**
        - **GET**: (default) Used to retrieve data.
        - **POST**: Sends data to the server (like submitting a form).
        - **PUT**: Replaces or updates data on the server.
        - **DELETE**: Deletes data from the server.

        **Options** you can pass in the `fetch()` function:
        - **method**: HTTP method (e.g., GET, POST).
        - **headers**: Object containing request headers (like `Content-Type`).
        - **body**: Data to send (only for POST, PUT, etc.).

        ---

        ### **Example 3: PUT Request (Updating Data)**
        Updating user information with a PUT request.

        ```javascript
        fetch('https://jsonplaceholder.typicode.com/users/1', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: 'Jane Doe',
            email: 'jane@example.com'
        })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Updated user:', data);
        })
        .catch(error => {
            console.error('Error updating user:', error);
        });
        ```

        ---

        ### **Example 4: DELETE Request (Deleting Data)**
        Deleting a user using a DELETE request.

            fetch('https://jsonplaceholder.typicode.com/users/1', {
            method: 'DELETE'
            })
            .then(response => {
                if (response.ok) {
                console.log('User deleted successfully');
                } else {
                console.error('Failed to delete user');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    

        ### **Advantages of the Fetch API**:
        1. **Simplified syntax** compared to `XMLHttpRequest`.
        2. **Promise-based**, making it easier to handle asynchronous requests.
        3. **Built-in JSON support**: Fetch automatically parses JSON responses when you call `.json()` on the response object.

        ### **Disadvantages**:
        1. **No automatic error handling**: Fetch won’t throw an error for HTTP errors. You need to manually check if the response was successful.
        2. **Limited browser support**: Older browsers don’t support Fetch, but you can use polyfills to make it work.

        ### Key Points to Remember:
        - **GET** is for retrieving data.
        - **POST** is for sending or creating data.
        - **PUT** is for updating data.
        - **DELETE** is for deleting data.
        - Always check for errors and handle promises properly.

        This should give you a solid foundation for using the Fetch API in your projects!

30.     Some Public API for  Testing:
        - https://jsonplaceholder.typicode.com/users



31.     HTTP Requests Using the Fetch API:

            The Fetch API is a modern way to make HTTP requests in JavaScript. It allows you to interact with servers, retrieve data, and send data using promises. 
            Its more flexible and cleaner than older methods like XMLHttpRequest.

        HTTP Requests Using Axios:

            Axios is a popular JavaScript library used for making HTTP requests from the browser or Node.js. 
            Its built on top of promises, providing a cleaner and more powerful way to handle requests compared to the Fetch API.

32. 
    <p v-for="user in users" :key="user.id">{{ user.name }}</p>

    - v-for="user in users":

        - The v-for directive is used for list rendering. It tells Vue to loop over the users array.
        - user in users means "for each user in the users array," where user is a temporary variable that holds the current item in each iteration.
        
    :key="user.id":

        - The key attribute is important for efficiently updating the DOM when the list changes. Vue uses the key to track each element uniquely and determine what has changed, added, or removed during updates.
        - user.id provides a unique identifier for each user. Every item in the users array should have a unique id field.

    {{ user.name }}:

        - This is Vue’s interpolation syntax. It displays the value of user.name, meaning the name property of each user object in the users array will be shown inside a <p> tag.


33. What are Mixins in Vue.js?
    Mixins are a flexible way to distribute reusable functionality across components in Vue.js. They allow you to define reusable logic (such as methods, lifecycle hooks, or computed properties) that can be shared between multiple components. When a component uses a mixin, all the properties and methods from the mixin are "mixed" into the component.

    Why use Mixins?
    Reusability: Instead of duplicating code, you can extract shared functionality into a mixin and reuse it across multiple components.
    Separation of Concerns: Mixins allow you to break down complex logic into smaller, reusable pieces that are easier to manage.

    Example:

    Here’s a step-by-step example of how you can use a **mixin** to share logic for incrementing a counter between two components (A and B) using the Composition API and `<script setup>`. We will create a `CounterMixin.js` file in the `Mixins` folder and use it in both components.

        ### Step 1: Create the `CounterMixin.js` file

        Inside the `Mixins` folder, create a `CounterMixin.js` file that contains the logic for incrementing the counter:

        ```js
        // Mixins/CounterMixin.js
        import { ref } from 'vue';

        export function useCounter() {
        const counter = ref(0);

        const increment = () => {
            counter.value++;
        };

        return {
            counter,
            increment
        };
        }
        ```

        ### Step 2: Create Component A

        Create `ComponentA.vue`, which will use the `useCounter` mixin:

        ```vue
        <template>
        <div>
            <h3>Component A</h3>
            <p>Counter: {{ counter }}</p>
            <button @click="increment">Increment in A</button>
        </div>
        </template>

        <script setup>
        import { useCounter } from './Mixins/CounterMixin'; // Import mixin

        const { counter, increment } = useCounter(); // Destructure and use the mixin
        </script>
        ```

        ### Step 3: Create Component B

        Create `ComponentB.vue`, which will also use the same `useCounter` mixin:

        ```vue
        <template>
        <div>
            <h3>Component B</h3>
            <p>Counter: {{ counter }}</p>
            <button @click="increment">Increment in B</button>
        </div>
        </template>

        <script setup>
        import { useCounter } from './Mixins/CounterMixin'; // Import mixin

        const { counter, increment } = useCounter(); // Destructure and use the mixin
        </script>
        ```

        ### Step 4: Use Components in App.vue

        Now, you can use both components (A and B) in `App.vue` to see the independent counters working:

        ```vue
        <template>
        <div>
            <h2>Using Mixins in Vue 3 with Composition API</h2>
            <ComponentA />
            <ComponentB />
        </div>
        </template>

        <script setup>
        import ComponentA from './ComponentA.vue';
        import ComponentB from './ComponentB.vue';
        </script>
        ```

        ### Explanation:
        1. **`CounterMixin.js`**:
        - This file contains the reusable logic for incrementing a counter using the `ref` function from Vue.
        - `useCounter` returns the `counter` and `increment` function, making them available to any component that imports and uses the mixin.

        2. **`ComponentA.vue` and `ComponentB.vue`**:
        - Both components import the `useCounter` mixin from `CounterMixin.js` and use the `counter` and `increment` methods.
        - Each component has its own instance of the `counter`, so they function independently.

        3. **App.vue**:
        - You are rendering both components, `ComponentA` and `ComponentB`. They will each maintain their own independent counter.

        ---



34. ### Pinia Overview

        - **What is Pinia?**
        - A state management library for Vue.js (like Vuex but simpler).
        - Centralizes the app's state, making it accessible across all components.

        - **Why Use Pinia?**
        - Simplifies data sharing between components.
        - Keeps the app's state organized and manageable.
        - Automatic UI updates when the state changes.
        - Works seamlessly with Vue 3 and Composition API.
        - Has built-in TypeScript support and better developer experience.

        - **Core Concepts:**
        - **State**: Reactive data shared across components (data we create using ref/ reactive in vue).
        - **Store**: A store is an entity holding state and login that is not bound to your Component Tree.
        - **Getters**: Like computed properties, used to derive data from the state.
        - **Actions**: Functions to modify the state, can handle async operations.
        
        - **Setup Process:**
        1. Install Pinia: `npm install pinia`

        2. Create Pinia instance in `main.js`: 

            import { createPinia } from 'pinia';
            const pinia = createPinia();
            app.use(pinia);

        3. Define a Store:

            export const useCounterStore = defineStore('counter', {
            state: () => ({ count: 0 }),
            actions: { increment() { this.count++ } }
            });

        4. Use in Components:

            const counter = useCounterStore();

        - **Benefits of Pinia:**
        - Modular and easy to maintain.
        - Lightweight compared to other state management tools.
        - Integrated with Vue Devtools for easy debugging.

        Pinia is a great choice for managing state in larger Vue apps, keeping things organized, simple, and reactive!


35. Chat GPT: https://chatgpt.com/share/b95b6a38-5fb7-4835-ac56-165a8c20a544


36. Similar Terms in Vue and Pinia

Vue and Pinia use different names for similar concepts, but they serve the same purpose. Here’s a quick comparison of the terms in both:

| **Vue (Composition API)** | **Pinia**               | **Description**                                                         |
|----------------------------|-------------------------|-------------------------------------------------------------------------|
| `ref()` / `reactive()`      | `state`                 | The reactive data used in your components (Vue) or store (Pinia).       |
| `computed()`               | `getters`               | Derived/computed values based on state.                                 |
| `methods`                  | `actions`               | Functions that modify state (Vue: methods, Pinia: actions).             |
| N/A                        | `store`                 | Centralized place for managing state in Pinia.                          |
| `props`                    | N/A                     | Props are component-specific, no direct equivalent in Pinia.            |
| `$emit()`                  | N/A                     | Used to emit events in Vue components; Pinia does not have event emitters. |
| `watch()`                  | N/A                     | Used in Vue to reactively respond to changes in state. Pinia relies more on state and actions. |

### Key Differences:
- **State**: In Vue, you manage state locally within components using `ref` or `reactive`. In Pinia, state is centralized in stores.
- **Getters**: In Vue, `computed()` is used to derive values from local state. In Pinia, `getters` are used for similar purposes but operate on centralized state.
- **Methods vs Actions**: In Vue, component-specific logic is handled in `methods`. In Pinia, actions are used to modify the state and can also handle asynchronous operations.

These terms highlight how Vue and Pinia handle similar concepts but differ in how they centralize and manage the state across the app.



37. Asynchronous action:
    An asynchronous action is a function that performs operations that don't complete immediately, allowing other tasks to run in the meantime. 
    In JavaScript, asynchronous operations are often related to tasks like:

    Fetching data from an API
    Reading or writing files
    Performing operations with a delay (like timers)
    In the context of Pinia (or Vue), asynchronous actions allow you to run tasks that take time to complete (such as API calls) and then update the 
    state when the task finishes. This prevents the UI from freezing while waiting for these operations to finish and improves the user experience.

    Why are Asynchronous Actions Important?
    Non-blocking: They allow your application to remain responsive while waiting for long tasks (e.g., fetching data from a server).
    Real-world scenarios: Most web applications involve some async operations, like loading data from a server or interacting with a database.


38. Pinia Actions: 
    In Pinia, actions are methods defined in the store that allow you to modify the state and perform asynchronous operations 
    (like fetching data from an API). Actions are useful because they let you encapsulate business logic, keeping your code clean and 
    organized.

    Actions in Pinia can:

        - Mutate the state.
        - Perform synchronous or asynchronous tasks (like API calls).
        - Be reused in different parts of the application.

    Syntax:

        import { defineStore } from 'pinia';

        export const useMyStore = defineStore('myStore', {
        state: () => ({
            count: 0
        }),
        
        actions: {
            // A simple action
            increment() {
            this.count++; // 'this' refers to the store instance
            },

            // An asynchronous action
            async fetchData() {
            const response = await fetch('https://api.example.com/data');
            const data = await response.json();
            console.log(data);
            }
        }
        });
