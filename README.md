# Ethics_Dashboard_1
Project repository for the COSC 499 Ethics Dashboard Group 1

**Query Language and DBMS:**

>Our choices and some rationale:

    We will use SQL as our DDL/DML with MySQL as the DBMS. This decision was made almost entirely due to the familiarity the developers hold with these 
    software. There are numerous other advantages that are covered in the Pros/Cons sections that weren’t explicitly used as rationale upon the initial discussion.

**Pros and Cons of Selected Technologies:**

>HTML Advantages:

    World Wide Web standard.
    Most popular markup language by far.
    Well understood by most professional developers, and maintenance.
    Intuitive structure.
    
>CSS/Bulma Advantages:

    Supports various markup languages but most widely HTML.
    Faster development
    Most popular of its kind for web development.
    Global styles can be applied to many or all pages in the application easily, since the general look of the application will be similar across all pages. 
    Specific changes can be made in stylesheets specific to the page. This abstraction will be helpful given the volume of pages in the application.
    Well understood by mostly anyone familiar with HTML; further developments, style changes, and maintenance will be easy.
    
>JavaScript Advantages:

    Extremely flexible language.
    Most popular of its kind for web development
    Alongside HTML and CSS forms the standard web development framework.
    Again, well understood by mostly anyone familiar with HTML.
    
>PHP Advantages:

    The group is fluent and familiar with PHP than other server side scripts
    PHP is a common standard across developers inside and outside of the group
    Large support.
    Ubiquitous across the internet
    
    
>PHP Disadvantages:

    May be slower than other frameworks to develop in the Django
    Security is a huge factor that the team needs to consider and develop
    
>SQL Advantages:

    Most popular query language for relational databases.
    Massive support and documentation.
    Team is familiar with SQL, and most developers familiar with web programming will be too.
    
>JQuery Advantages:

    Well known DBMS.
    Massive support and documentation.
    Supported by numerous hosts.

>Users of the application and stakeholders:

    The users of the app include professors, students, and TAs. 
    The stakeholders include: 
        Professors as they are the ones using the platform in their classes
        Students as they are the ones who will be learning and doing assignments on the app
        TAs as they will be using the app to work (as in grading)
        The institutions that this will be implemented at
        The capstone team developing the project as they want it to work in order to gain successful experience and receive a good grade in the class
        Any future software teams looking to add to this project and further develop it

>What are we using for the backend:

    The backend will be built using PHP as the framework since it is flexible and easy to use and learn which would allow our back end development to be simple, yet effective and dynamic. 
    PHP would also be best as it may allow us to implement some artificial intelligence or machine learning feature either for the current project or in the         future. 
    Using PHP will also make the project very easy to maintain for the future evolutions of the project.
    
**Testing Strategies:**

>General Testing Strategies:

    We are going to utilize functional testing strategies to verify that the application behaves correctly and the way we expect it to. 
    This will be mostly accomplished through manual testing of inputs and evaluating the outputs to deem whether it is correct or not. 
    Some automated testing will be made use of, particularly for server side scripting such that there are no unknown security vulnerabilities or bad output. 
    After functional testing is completed and deemed correct, we will perform nonfunctional testing to determine if the application is responsive, has reasonable   
    loading times, if it is compatible with older builds, and if it can handle high loads.

>Frontend Testing:

    The frontend is composed of HTML and CSS, as these technologies are static, there is little testing required apart from manual testing of links, visual     
    verification that styles are appropriate and consistent, and so on. 
    The HTML will be developed correctly such that document object model manipulation and access does not break the flow when applying scripts.

>Backend Testing:

    Our backend is split into three testable segments: The client-side scripting, server-side scripting, and database access and manipulation. 
    For the client side, we will attempt to employ ESLint, a JavaScript code linter. 
    Our client-side scripting will require relatively little active testing compared to other backend components, since the extent of client-side scripting will be     to accomplish checkboxes, radio buttons, pre-request text box handling, and so on. 
    ESLint provides an extension to regular IDE warnings and suggestions, reducing bad practice and thus reducing vulnerability, errors, and slowness.

    Server-side scripting and database access and manipulation will be handled with a mix of manual and automatic testing practices. 
    GET and POST strings will be fed into the server-side script and sent to the database, then returned. 
    Because security and correctness of database results are of utmost importance, we will place a large emphasis on the database access and manipulation portion
    of testing. 
    This means attempting to throw junk input as well as attempting to conduct injection attacks, to verify that the system behaves as required.

>Continuous Integration:

    Continuous integration will allow us to create numerous builds of the system without breaking - or at least severely breaking the system - through a very   
    modular file format. 
    Each new page of the application is a new HTML file with no effect on the others, with styles extracted from a static CSS library. 
    The scripting will be handled mostly on a file-to-file basis, and the database is kept separate from everything. This means all components of the system are 
    only tenuously linked, and will not break each other if one file is in error.
    As well, with such frequent commits, any issues will be trivial and small in nature, since not much work can be done between commits. 
    If we did not adopt continuous integration in this manner, we would have to sift through large files or collections of files with no idea where the problem is.

>Regression Testing:

	Regression testing will be easily conducted due to the method of continuous integration we are employing, due to the triviality of changes made per commit.
    While we are conducting testing as we develop, this may not be appropriate after more functionality is added, and we will need to conduct even more 
    comprehensive testing on previous functionality in our program. 
    Say, our HTML may be correctly formatted when static, but after modifying, for example, a text box, it may break. 
    This requires us to expand upon our testing from just one form to a mix of multiple, as these technologies are interacting.


**Main Features**
>The end goal of the project is to allow students to use it for learning case studies and for the project to be easily maintainable for future developers.

>Short Term development 

    -The dashboard must be hosted on Canadian server
    -We will be using MySQL to implement the database
    -Easy to read documentation for maintenance
    -Students should be able to work on multiple case studies at a time
    -An AI to prevent plagiarism 
    -Detail inputs to ensure students stay engaged during use
    -An AI to insure students stay relevant to the course material and understand the learning goals
    -Gut reactions, the app will require a systematic analysis of the ethics

>Long Term development

    -A mobile version of the app 
    -The integration of more game-like inputs 
    -An AI capable of providing immediate feedback to students as they work through a case 
    -Eventually, the AI should be capable of taking on all evaluative tasks for case analysis 
    
**Creative Exploration:**
>Some ideas on how we can change the aesthetics or functionality aside from the proposal:

    We can explore many different aesthetics using CSS and play around with different looks and color combinations. We may also look into using bootstrap to aid 
    in the look of the application. For better functionality, we can play around with things such as changing the button placement to make it more user friendly.
    
    The team has decided to review our decision for the front end framework. We realized that it might make the design nicer and easier to implement. So we are 
    currently looking into using jQuery and Bulma for our front end.

