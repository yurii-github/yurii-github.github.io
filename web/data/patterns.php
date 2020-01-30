<?php
return <<<JSON
[
    {
        "name": "Factory",
        "type": "construction",
        "problem": "code deduplication on initiating objects <br>easy custom new objects configuration",
        "solution": "provide function that will return new object with pre-defined constructor settings"
    },
    {
        "name": "Abstract Factory",
        "type": "construction",
        "problem": "code deduplication on intiating of object family, like 'wheels' and 'doors'",
        "solution": "provide abstraction layer by introducing interface for future factory"
    },
    {
        "name": "Builder",
        "type": "construction",
        "problem": "code deduplication on initiating objects with complex custom configurations",
        "solution": "provide functions that can be chained with granular options for new object"
    },
    {
        "name": "Singleton",
        "type": "construction",
        "problem": "have a single instance of object to save resources <br> must exist on request",
        "solution": "forbid object construction, get new single instance via getter function",
        "drawbacks": "UnitTesting has problems"
    },
    {
        "name": "Multiton",
        "aliases": [
            "Registry of Singletons"
        ],
        "type": "construction",
        "problem": "deduplication of code for acheving single object per class",
        "solution": "provide base class that will act as registry or hashmap for storing array of single class objects"
    },
    {
        "name": "Object Value",
        "type": "structure",
        "problem": "operate with complex values like currency as single object",
        "solution": "produce immutable objects via getter/setter function, basically by clonning objects or creating new"
    },
    {
        "name": "Registry",
        "type": "structure",
        "problem": "organization of global variables and setting rules for their access",
        "solution": "static variables combined into class accessible via getters and setters"
    },
    {
        "name": "Proxy",
        "aliases": [
            "Wrapper"
        ],
        "type": "structure",
        "problem": "hide direct access to object, provide lazy loading",
        "solution": "initiate object of interest internally in proxy object on request and wrap its functionality without behavior modification"
    },
    {
        "name": "Decorator",
        "aliases": [
            "Wrapper"
        ],
        "type": "structure",
        "problem": "extend object's  functionality multiple times without additional subclassing",
        "solution": "pass object of interest as dependency to our decorator class and extend object's functionality"
    },
    {
        "name": "Adapter",
        "aliases": [
            "Wrapper"
        ],
        "type": "structure",
        "problem": "avoid total code rewrite due to changed object's functionality and interface",
        "solution": "pass object of interest as dependency to our adapter class and make it compatible with our existing interface"
    },
    {
        "name": "Composite",
        "type": "structure",
        "aliases": [
            "Wrapper"
        ],
        "problem": "reduce complexity of object due to big amount of internal properties' interactions",
        "solution": "Basic OOP principle!<br>provide interface(s) for similar properties' operations organazing them into hierarchical tree"
    },
    {
        "name": "Dependency Injection (DI)",
        "type": "structure",
        "problem": "ability to pass object as parameter of particular class",
        "solution": "BASIC OOP principle!<br>Pass required object of required class via constructor or setter function"
    },
    {
        "name": "Dependency Inversion",
        "type": "structure",
        "problem": "ability to pass object as parameter of particular class family",
        "solution": "BASIC OOP principle!<br>Create interface and pass required object of required interface via constructor or setter function"
    },
    {
        "name": "Domain Model",
        "type": "storage",
        "problem": "extend data object with business logic",
        "solution": "create single object with data and logic as functions"
    },
    {
        "name": "Active Record",
        "type": "storage",
        "problem": "ability to save particular object to database",
        "solution": "combine data to store, business logic and database operations in the same particular object<br>Leads to breaking OOP principle of single responsibility"
    },
    {
        "name": "Table Data Gateway",
        "type": "storage",
        "problem": "ability to save particular object to database but with separation of database operations outside",
        "solution": "introduce data layer object that will hold database operations with table granularity"
    },
    {
        "name": "Data Mapper",
        "type": "storage",
        "problem": "ability to save particular object to database but with separation of database operations and its property names",
        "solution": "introduce data layer object that holds data object property names binding to data storage properties etc."
    },
    {
        "name": "Observer",
        "aliases": [
            "Events",
            "Subscriber/Listener",
            "Push"
        ],
        "type": "behavior",
        "problem": "notification of other objects about particular object's state updates",
        "solution": "introduce event interface that will be recognised by observer <br> introduce listener interface that will be recognised by observer <br> introduce main observer that will monitor states of registered objects as listeners and events"
    },
    {
        "name": "Specification",
        "type": "structure",
        "problem": "reduce complexity of different requirements based on object's properties",
        "solution": "introduce specification class that holds comparition requirements"
    },
    {
        "name": "Chain",
        "type": "behavior",
        "problem": "reduce frequency of using object name when calling several functions of the same object",
        "solution": "function returns 'this'"
    },
    {
        "name": "Iterator",
        "type": "storage",
        "problem": "custom access of array of objects or any other data as list",
        "solution": "implement Iterator interface for custom behavior of SPL"
    },
    {
        "name": "Strategy",
        "aliases": [
            "Policy"
        ],
        "type": "behavior",
        "problem": "ability to change object behavior at runtime",
        "solution": "introduce strategy interface and add to object of interest variable that will hold new strategy and will use it in its functions"
    },
    {
        "name": "Controller",
        "type": "access",
        "problem": "controlling of application execution, navigation, etc",
        "solution": "introduce controller object that executes checks at runtime"
    },
    {
        "name": "Command",
        "type": "behavior",
        "problem": "bigger control and abstraction on requested command or instruction",
        "solution": "encapsulate command into object by providing interface for it"
    },
    {
        "name": "Front Controller",
        "type": "access",
        "problem": "deduplication access code",
        "solution": "introduce main controller object that will delegate executing on lower controller(s)<br>In reality, just entry point as index.php"
    },
    {
        "name": "Model View Controller (MVC)",
        "type": "access",
        "aliases": ["Controller", "View", "Model"],
        "problem": "separation between business logic, presentation and application flow",
        "solution": "introduce interfaces for controller, view and model<br>Basically combination of most prominent functionality separation"
    },
    {
        "name": "Data Transfer Object (DTO)",
        "type": "structure",
        "problem": "avoid passing too many parameters to functions",
        "solution": "define class without business logic that will hold required properties"
    },
    {
        "name": "Chain of responsibility",
        "type": "behavior",
        "problem": "",
        "solution": "I have not strength to type it or comment. <br> <a href='https://en.wikipedia.org/wiki/Chain-of-responsibility_pattern'>just google</a><br>So useless pattern"
    },
    {
        "name": "Special Case Object",
        "aliases": [
            "Null Object"
        ],
        "type": "behavior",
        "problem": "handle special cases instead of throwing exceptions",
        "solution": "create object with predefined state, mostly used as Null Object that does nothing"
    },
    {
        "name": "Repository",
        "type": "storage",
        "problem": "",
        "solution": ""
    },
    {
        "name": "Entity",
        "type": "storage",
        "problem": "combine business (domain) data object into single instance that can be re-used",
        "solution": ["create class that represents required business object and its most vital operation logic", "Mostly created from ERP or simply from database perspective", "In the end, one entity may be stored in several tables"]
    },
    {
        "name": "Visitor",
        "aliases": [
            "Observer"
        ],
        "type": "behavior",
        "problem": "separate operations from objects we perform operations on",
        "solution": "provide interface with operation, objects inherit interface and create new object that will hold operations"
    },
    {
        "name": "Wrapper",
        "type": "behavior",
        "problem": "change functionality of existing class(es)",
        "solution": ["Wrap existing class with new class and/or interface and provide own implementations", "Basically, almost all of 90% 'patterns' are just wrappers"]
    },
    {
        "name": "God Object",
        "aliases": [
            "Facade"
        ],
        "type": "storage",
        "problem": "too many small activities that will lead to many abstractions",
        "solution": "create single object that will combine all activities in itself<br>Reduces complexity and increases performance<br>Breaks OOP single responsibility principle"
    },
    {
        "name": "State",
        "type": "behavior",
        "aliases": ["Strategy", "Wrapper"],
        "problem": "differrent object behavior on different conditions/states",
        "solution": ["implement state interface and include functionality on it (info about state is also known as context or state context)", "Saying simply - it wraps functionality by another class"]
    },
    {
        "name": "Mock Object",
        "type": "storage",
        "problem": "",
        "solution": ""
    },
    {
        "name": "Mediator",
        "type": "storage",
        "problem": "",
        "solution": ""
    },
    {
        "name": "Memento",
        "type": "storage",
        "problem": "ability to restore object to previous state(s)",
        "solution": ["Provide additional 2 classes - 1 for operating with state and 1 for state itself. Actual useful class is hidden from direct manipulation", "Simply said - very retarded and useless approach"]
    },
    {
        "name": "Template Method",
        "type": "behavior",
        "problem": "change algorythm without changing current class",
        "solution": "provide abstract class with algothym moved to function that can be replaced in its subclasses<br>Simple OOP inheritance/override principle!"
    },
    {
        "name": "Interpreter",
        "type": "storage",
        "problem": "",
        "solution": ""
    },
    {
        "name": "Private Class Data",
        "type": "storage",
        "problem": "too many data attributes in object",
        "solution": "simplify object by removing object attributes outside into another 'data' class"
    },
    {
        "name": "Flyweight",
        "type": "storage",
        "aliases": ["Wrapper"],
        "problem": "decrease memory usage on similar duplicated objects",
        "solution": "wrap-out duplicated data into another static object that will share its data as readonly with other objects"
    },
    {
        "name": "Facade",
        "type": "storage",
        "aliases": [
            "Wrapper",
            "Composition"
        ],
        "problem": "simplify usage of complex functinality",
        "solution": [
            "create object that will combine other complex stuff and provide single simple interface",
            "Can be source of breaking DI principle"
        ]
    },
    {
        "name": "Bridge",
        "type": "storage",
        "problem": "decouple an abstraction from its implementation so that the two can vary independently",
        "solution": "Basic OOP principle!<br>do class abstraction via inheritance"
    },
    {
        "name": "Factory Method",
        "type": "construction",
        "problem": "create new object by just calling a function",
        "solution": "just init object in your new 'Factory' function<br>Breaks DI OOP principle "
    },
    {
        "name": "Object Pool",
        "aliases": [
            "Container",
            "Selector",
            "Locator",
            "Registry",
            "Services"
        ],
        "type": "construction",
        "problem": "re-use of objects instead of recreating them",
        "solution": [
            "create object that will hold other objects",
            "Pool keeps object inits of all objects in list as ready to use",
            "Locator inits objects on demand",
            "Registry holds only variables via getters/setters",
            "Container has also some advanced logic in itself compared to Locator"
        ]
    },
    {
        "name": "Prototype",
        "type": "construction",
        "aliases": [
            "Factory"
        ],
        "problem": "create object very similar to existing one",
        "solution": "Just make proper clone, in PHP you can override __clone function"
    }
]
JSON;
