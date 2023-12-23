# EhB Interschool Voetbal App

## Introduction

Since the Erasmushogeschool campuses in Brussels lack sports activities and a change of scenery, we have decided to design a responsive platform allowing students to register on the Interschool Voetbal App. This involves automating a football competition among students from multiple campuses. Students can register by choosing from ten teams, either joining their friends, meeting new students from other campuses, or both. They can play as a regular player, captain, or reserve player (each team consists of 7 players, including 2 reserves and 1 captain).

The captain has a personalized page to modify the team name and enter the final score of each match. After each match, both captains must enter the final result by selecting the goal-scorers. In the case of a tie, the championship ranking is automatically updated, along with the top scorers' ranking. If the two captains do not agree on the score, the administrator receives a notification to address the issue.

The administrator is the one who initiates the championship by pressing the button to generate the schedule. At the end of each season, the administrator can reset the database for a fresh start to a new championship season.

In the future, the student services STUVO and Enigma (student association of Campus Kaai in Anderlecht) are open to collaboration if this project is to be organized.

## Project Setup

Follow these steps to set up and run the project locally:

-   Open your terminal
-   Use these commands :

    -   composer install
    -   cp .env.example .env
    -   php artisan key:generate
    -   php artisan migrate:fresh --seed (Wait for Seeding database)
    -   php artisan serve

    Open a new terminal and use these commands:

    -   npm install
    -   npm run dev

Now open your browser on [http://127.0.0.1:8000] and enjoy our website!

## Configurations and Structure

-   Go to the .env file and copy this code from line 31 to 38:
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.googlemail.com
    MAIL_PORT=465
    MAIL_USERNAME=info.va.ehb@gmail.com
    MAIL_PASSWORD=zxsajznwtlugkvrr
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS=info.va.ehb@gmail.com
    MAIL_FROM_NAME="Interschool Voetbal App"

The XAMPP software is essential to activate the Apache and MySQL modules. By clicking the 'Admin' button next to start for MySQL, you will have access to the database with PhpMyAdmin.

### About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Programming languages, technologies and frameworks

The programming language used in this project is PHP. A portion of the project has been generated using Laravel 10 framework. For the frontend, we utilized Tailwind to simplify the design of our views. We also use CSS and JS, which are consolidated in the "public" folder under the names "js blades" and "css blades."

-   Programming languages : PHP
-   Database management system : PhpMyAdmin (via XAMPP)
-   Laravel 10
-   Styling : HTML, CSS and JS
-   Styling frameworks : Tailwind and Bootstrap

## Contributions

Instructions for those who wish to contribute to the project. This may include information on pull requests, coding conventions, etc. If you're interested in contributing to our project, follow these guidelines:

-   Fork the Repository: Start by forking our project repository to your own GitHub account.
-   Clone the Repository: Clone the forked repository to your local machine.
-   Create a New Branch: Create a new branch for your contribution.
-   Make Changes: Make your desired changes or additions to the code.
-   Commit Changes: Commit your changes with a descriptive commit message.
-   Push Changes: Push your changes to your forked repository.
-   Submit a Pull Request (PR): Open a pull request from your branch to the main project repository. Provide a clear description of your changes.
-   Code Review: Your contribution will undergo a code review. Make any necessary changes as requested.
-   Merge: Once approved, your changes will be merged into the main branch.

Thank you for contributing to our project!

## License

This project is distributed under the MIT License. See the LICENSE file for details.

### License Terms

Key Terms:

-   Modification: You are free to modify and adapt the code.
-   Redistribution: You may redistribute the code in both source and binary forms.
-   Commercial Use: The code can be used for commercial purposes without restrictions.
-   Attribution: Attribution to the original author(s) must be included in copies or substantial portions of the code.
-   Derivative Works: You can create derivative works based on the code.
-   Warranty: The code is provided "as is," without any warranty or guarantee.
-   State Changes: Changes made to the code must be clearly stated.

For the full text of the MIT License, please see the LICENSE file included in the project.

We encourage contributions to this project. Check out the CONTRIBUTING.md for more information on how to get involved.

**Note:** While this project was created in an academic context, adding a license aims to clearly define usage terms and protect the rights of contributors.

# Image Credits
In the project's public directory, you will find a file called "img blades" containing a variety of images used to illustrate the platform's pages.

This project uses images from various sources, and we would like to express our gratitude to the talented photographers who created these works. Below is a list of the images used, along with the appropriate credits:

## Background Image

1. !backgroundimage.png ([Link](https://stock.adobe.com/jp/images/blue-futsal-ball-in-the-center-of-a-futuristic-indoor-soccer-field-with-glowing-white-lines-background/450869893)  
*Photo Credit: Martin Piechotta ([Link to Profile](photographer_profile_link))*
2. !composition.jpg ([Link](https://www.gettyimages.be/detail/illustratie/the-concept-of-development-of-events-and-royalty-free-illustraties/1407376618?adppopup=true)   
   *Photo Credit: Elena Kopusova ([Link to Profile](https://www.gettyimages.be/search/photographer?photographer=Elena%20Kopusova))*
3. !coveradmin.jpg ([Link](https://www.istockphoto.com/jp/%E3%82%B9%E3%83%88%E3%83%83%E3%82%AF%E3%83%95%E3%82%A9%E3%83%88/%E3%83%90%E3%83%83%E3%82%AF%E3%81%AE%E3%82%B5%E3%83%83%E3%82%AB%E3%83%BC%E9%81%B8%E6%89%8B%E3%81%AE%E5%89%8D%E3%81%AB%E3%83%95%E3%83%AB%E3%82%B9%E3%82%BF%E3%82%B8%E3%82%A2%E3%83%A0-gm94735731-1625308)   
   *Photo Credit: Jan du Bois ([Link to Profile](https://brunswyck-wathelet.brussels/nl/catalogus/erasmus-hogeschool-cvo-brussel-nijverheidskaai-170-materiaalstraat-67-anderlecht))*

## Other Images

1. !backgroundfoto.jpg ([Link](https://www.wallpapertip.com/wpic/TxbibJ_torneo-de-futsal/)  
   *Photo Credit: Cherry Chapstick ([Link to Profile](https://www.wallpapertip.com/uwall/4313/))*
2. !erasmusgebouw.png ([Link](https://brunswyck-wathelet.brussels/nl/catalogus/erasmus-hogeschool-cvo-brussel-nijverheidskaai-170-materiaalstraat-67-anderlecht)  
   *Photo Credit: Cherry Chapstick ([Link to Profile](https://www.wallpapertip.com/uwall/4313/))*
3.!composition.png ([Link](https://www.freepik.com/premium-vector/football-tactic-scheme-soccer-game-strategy-with-arrows-black-chalk-board-coach-attack-plan-play-field-top-view-vector-concept-illustration-game-line-attack-soccer-instruction_17610604.htm)
4.!football-image.jpg ([Link](https://www.1zoom.me/fr/wallpaper/240992/z469.6/1920x1080))*
5.!fustal.jpg ([Link](https://www.futsalinstitute.com/futsal-court-hire))*
6.!headadminpage.jpg ([Link](https://www.gettyimages.fi/detail/valokuva/the-football-field-rojaltivapaa-kuva/526528685?adppopup=true))*
7.!topscorericon.png ([Link](https://thenounproject.com/icon/top-scorer-3742479/))*
8.!positionicon.png ([Link](https://www.flaticon.com/fr/icone-gratuite/broche-de-localisation_1237707))*
9.!iconyoutube.png([link](https://icon-icons.com/fr/icone/youtube/100150))
*Photo Credit: Alexis Doreau ([Link to Profile](https://icon-icons.com/fr/users/1HkvyotKrTXxrxMPBXh3y/icon-sets/))
10. !iconsettings.png ([Link](https://icon-icons.com/fr/icone/param%C3%A8tres-la-sgp/87317))
*Photo Credit: Pavel Kozlov (Link to Profile([Link](https://icon-icons.com/fr/users/HrviC1xrsweoTQuA97vrJ/icon-sets/)
11.!iconfacebook.png ([Link](https://icon-icons.com/fr/users/HrviC1xrsweoTQuA97vrJ/icon-sets/))
*Photo Credit: krystonschwarze ([Link](https://icon-icons.com/fr/users/oF4mCncjumbbdnwSxjSwV/icon-sets/))
12.!iconlinkedin.png ([Link](https://icon-icons.com/fr/icone/linkedin-signe/73508))
*Photo Credit: Dave Gandy ([Link](https://icon-icons.com/fr/users/2LUKwJe4QDNsjuhkS98IX/icon-sets/))
13.!messagelogo.png ([Link](https://icon-icons.com/fr/icone/message-bubble-chat/114816))
*Photo Credit: HevnGrafix ([Link](https://icon-icons.com/fr/users/cEPU9aHASfjRgRmD9lkCX/icon-sets/))
14.!positionicon.png([Link](https://www.istockphoto.com/fr/vectoriel/broche-carte-ic%C3%B4ne-vector-plat-silhouette-isol%C3%A9e-gm943476388-257781158?irgwc=1&cid=IS&utm_medium=affiliate&utm_source=icon-icons&clickid=zOUXIMW3jxyPTK3xv9R3I1wpUkH0bvXhDT2Zx00&utm_content=258824&irpid=2205776))
*Photo Credit: Esfir Dzhyshkariani ([Link](https://www.istockphoto.com/fr/portfolio/Esfirse?mediatype=illustration))

  


We are thankful to these artists for their outstanding visual contributions to our project.

# Contributors

-   [Nawfel Ajari](https://github.com/n4wf3l) - Project Owner/Frontend Developer/UX/UI Designer
-   [Kristian Vasiaj](https://github.com/kvsj123) - Quality Assurance/Fullstack Developer
-   [Ismael Bouzrouti](https://github.com/ismaelbouzrouti) - Scrum Master/Backend Developer
-   [Jack Thyssens](https://github.com/jackthyssens) - DBA (Database Administrator)/Backend Developer
-   [Soufian Jaâtar](https://github.com/JAATAR) - Frontend Developer

# Thanks

First and foremost, we would like to express our gratitude to the entire team of developers who participated in this project with fascinating motivation. The professionalism exhibited by each member of the team is noteworthy, enabling us to conduct a project overview and analysis under optimal conditions, brimming with ideas, inspirations, and, most importantly, resolutions to potential challenges.

On the technical front, special thanks to Kristian Vasiaj, who fully dedicated himself to the backend, ensuring the realization of all the logical components. I would also like to extend my appreciation to Jack Thyssens for his work on building the database, while also being fully engaged in the backend development. Ismael Bouzrouti was also highly involved in this project: few commits, significant results, that's how his work ethic can be described—implementation of a Maps API, resolution of numerous bugs, and additional assistance in the backend trio. Soufian Jaâtar also played a key role in the frontend, providing valuable support on important details. Nawfel Ajari (product owner) was key for the frontend and overall UX/UI. Without his creativity, skills, passion and overall contagious motivation we would have never had a project like this. All of this was developed in record time, within two weeks, divided into two sprints with one to two on-campus sessions.

A special thanks goes to our project supervisors, Professors Robin Bervoets, Tom Aertssens and Ruben Dejonckheere, for their valuable feedback. Their guidance has strengthened our commitment to delivering high-quality work, not only on the technical front but also in the imaginative design of the project, foresight into potential future issues, thorough analysis, and adherence to the disciplines of web development sprints. We appreciate the support of our academic mentors. Additionally, we extend our gratitude to Johan Peeters for his insightful guidance throughout the project. While our project did not explicitly focus on security aspects, we thank Johan for his valuable expertise and contributions to our overall understanding of web development.

# Project Status

The project is currently under development and will continue until Sunday, December 24, 2023 (deadline). It will be assessed in January 2024 by the mentioned professors.

# Contact

You can always contact one of our developers or report issues via our LinkedIn social media. Here they are below:

-   [Nawfel Ajari](https://www.linkedin.com/in/nawfel-ajari-8a26471a4/) - Project Owner/Frontend Developer/UX/UI Designer
-   [Kristian Vasiaj](https://www.linkedin.com/in/kristian-vasiaj-705b46223/) - Quality Assurance/Fullstack Developer
-   [Ismael Bouzrouti](https://www.linkedin.com/in/ismaelbouzrouti/) - Scrum Master/Backend Developer
-   [Jack Thyssens](https://www.linkedin.com/in/jack-thyssens/) - DBA (Database Administrator)/Backend Developer
-   [Soufian Jaâtar](https://www.linkedin.com/in/soufian-jaatar-05ba34259/) - Frontend Developer

# Examples / Screenshots

See Github Repository
