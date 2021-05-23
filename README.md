# Quizify (🌽 Cornzone team)

**Internet Programming: Group Project Assignment**

## Get Quizified to stay exercised

"Quizify" is tool to simplify education process for teachers and students. It's an online platform available for everyone, everywhere. No need to attend educational establishments, just get Quizified!

## Installation

The project is written with Laravel. To run you need php version at least 7.2.5 and MySQL database
Use the package manager. After installing php, MySQL database and [Composer](https://getcomposer.org/) package manager, you need to fill in the .env file according to the provided example and run the commands below.

```bash
# generate laravel app key
php artisan key:generate

# Run database migrations and seeders
php artisan migrate
php artisan db:seed
# or
php artisan migrate:fresh --seed
```

## Usage

To run the project, you need to run 2 commands:
```bash
# Run php server
php artisan serve

# Listen scss and js file changes (optional)
npm install && npm run watch
```

## Note

The project has been moved from the original [Quizify](https://github.com/JRakhimov/quizify) repository. To track the early stages of development, we recommend looking at the old repository.

The project interface design can be found at the [link](https://www.figma.com/file/F8xgI694OiBHHNAw9ABkTr/IP_Project?node-id=0%3A1)

![image](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)
![image](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![image](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
