# EhB Interschool Voetbal App
## Introduction
Since the Erasmushogeschool campuses in Brussels lack sports activities and a change of scenery, we have decided to design a responsive platform allowing students to register on the Interschool Voetbal App. This involves automating a football competition among students from multiple campuses. Students can register by choosing from ten teams, either joining their friends, meeting new students from other campuses, or both. They can play as a regular player, captain, or reserve player (each team consists of 7 players, including 2 reserves and 1 captain).

The captain has a personalized page to modify the team name and enter the final score of each match. After each match, both captains must enter the final result by selecting the goal-scorers. In the case of a tie, the championship ranking is automatically updated, along with the top scorers' ranking. If the two captains do not agree on the score, the administrator receives a notification to address the issue.

The administrator is the one who initiates the championship by pressing the button to generate the schedule. At the end of each season, the administrator can reset the database for a fresh start to a new championship season.

## Installation
 - Clone the project on your IDE
 - Open your terminal
 - Typ these command :
   * npm composer
   * php artisan key:generate
   * cp .env.example .env
   * php artisan migrate
   * npm install
   * npm run dev
   * php artisan serve
- You can now open your browser and enjoy the platform!

## Configurations and Structure
(UPDATE COMING SOON)
The XAMPP software is essential to activate the Apache and MySQL modules. It is through the 'Admin' button in MySQL that your PhpMyAdmin will open, allowing you to view your seed migrations.

The project is easy for modifications, both in the frontend and the backend. We have structured our code, occasionally adding comments to facilitate modification for external developers: Controllers, Models, Seeders, Routes, Blades (Tailwind), and JS & CSS files. Do you want to work on the project locally? Perform the installation and launch the application via the terminal by typing: "php artisan serve."

## Programming languages, technologies and frameworks
The programming language used in this project is PHP. A portion of the project has been generated using Laravel 10 framework. For the frontend, we utilized Tailwind to simplify the design of our views. We also use CSS and JS, which are consolidated in the "public" folder under the names "js blades" and "css blades."

- Programming languages : PHP
- Database management system : PhpMyAdmin (via XAMPP)
- Laravel 10
- Styling : HTML, CSS and JS
- Styling frameworks : Tailwind and Bootstrap

## Contributions 
Instructions for those who wish to contribute to the project. This may include information on pull requests, coding conventions, etc. If you're interested in contributing to our project, follow these guidelines:

- Fork the Repository: Start by forking our project repository to your own GitHub account.
- Clone the Repository: Clone the forked repository to your local machine.
- Create a New Branch: Create a new branch for your contribution.
- Make Changes: Make your desired changes or additions to the code.
- Commit Changes: Commit your changes with a descriptive commit message.
- Push Changes: Push your changes to your forked repository.
- Submit a Pull Request (PR): Open a pull request from your branch to the main project repository. Provide a clear description of your changes.
- Code Review: Your contribution will undergo a code review. Make any necessary changes as requested.
- Merge: Once approved, your changes will be merged into the main branch.

Thank you for contributing to our project!

## License

This project is distributed under the MIT License. See the LICENSE file for details.

### License Terms

Key Terms:
- Modification: You are free to modify and adapt the code.
- Redistribution: You may redistribute the code in both source and binary forms.
- Commercial Use: The code can be used for commercial purposes without restrictions.
- Attribution: Attribution to the original author(s) must be included in copies or substantial portions of the code.
- Derivative Works: You can create derivative works based on the code.
- Warranty: The code is provided "as is," without any warranty or guarantee.
- State Changes: Changes made to the code must be clearly stated.

For the full text of the MIT License, please see the LICENSE file included in the project.

We encourage contributions to this project. Check out the CONTRIBUTING.md for more information on how to get involved.

**Note:** While this project was created in an academic context, adding a license aims to clearly define usage terms and protect the rights of contributors.


# Contributors

- [Nawfel Ajari](https://github.com/n4wf3l) - Project Owner/Frontend Developer/UX/UI Designer
- [Kristian Vasiaj](https://github.com/kvsj123) - Quality Assurance/Fullstack Developer
- [Ismael Bouzrouti](https://github.com/ismaelbouzrouti) - Scrum Master/Backend Developer
- [Jack Thyssens](https://github.com/jackthyssens) - DBA (Database Administrator)/Backend Developer
- [Soufian Jaâtar](https://github.com/JAATAR) - Frontend Developer

# Thanks
First and foremost, I (Nawfel Ajari - Project Owner) would like to express my gratitude to the entire team of developers who participated in this project with fascinating motivation. The professionalism exhibited by each member of the team is noteworthy, enabling us to conduct a project overview and analysis under optimal conditions, brimming with ideas, inspirations, and, most importantly, resolutions to potential challenges.

On the technical front, special thanks to Kristian Vasiaj, who fully dedicated himself to the backend, ensuring the realization of all the logical components. I would also like to extend my appreciation to Jack Thyssens for his work on building the database, while also being fully engaged in the backend development. Ismael Bouzrouti was also highly involved in this project: few commits, significant results, that's how his work ethic can be described—implementation of a Maps API, resolution of numerous bugs, and additional assistance in the backend trio. Soufian Jaâtar also played a key role in the frontend, providing valuable support on important details. All of this was developed in record time, within two weeks, divided into two sprints with one to two on-campus sessions.

Special thanks also go to our project supervisors, Professors Robin Bervoets, Tom Aertssens and Ruben Dejonckheere, for their valuable feedback. Their guidance has strengthened our commitment to delivering high-quality work, not only on the technical front but also in the imaginative design of the project, foresight into potential future issues, thorough analysis, and adherence to the disciplines of web development sprints. We appreciate the support of our academic mentors. Additionally, we extend our gratitude to Johan Peeters for his insightful guidance throughout the project. While our project did not explicitly focus on security aspects, we thank Johan for his valuable expertise and contributions to our overall understanding of web development.

# Project Status
The project is currently under development and will continue until Sunday, December 24, 2023 (deadline). It will be assessed in January 2024 by the mentioned professors.

# Contact
You can always contact one of our developers or report issues via our LinkedIn social media. Here they are below:

- [Nawfel Ajari](https://www.linkedin.com/in/nawfel-ajari-8a26471a4/) - Project Owner/Frontend Developer/UX/UI Designer
- [Kristian Vasiaj](https://www.linkedin.com/in/kristian-vasiaj-705b46223/) - Quality Assurance/Fullstack Developer
- [Ismael Bouzrouti](https://www.linkedin.com/in/ismaelbouzrouti/) - Scrum Master/Backend Developer
- [Jack Thyssens](https://www.linkedin.com/in/jack-thyssens/) - DBA (Database Administrator)/Backend Developer
- [Soufian Jaâtar](https://www.linkedin.com/in/soufian-jaatar-05ba34259/) - Frontend Developer

# Examples / Screenshots
(UPDATE COMING SOON)


