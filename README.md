# Code Snippet Manager

Code Snippet Manager is a tool designed to simplify the process of managing and sharing code snippets among developers. It leverages Laravel 10, PHP 8.2, and Redis for caching to provide an efficient and user-friendly platform for developers to store, retrieve, and collaborate on code snippets seamlessly.

## Features

- **GraphQL API:** The core of this tool is built around a GraphQL API, allowing developers to interact with the system using a flexible and powerful query language.
- **Snippet Management:** Easily create, update, delete, and retrieve code snippets. Each snippet is associated with metadata such as title, description, tags, and language for efficient organization.
- **Search and Filtering:** Quickly find the snippets you need using search queries and filtering options based on tags, language, and more.
- **User Authentication: Secure user authentication and authorization are integrated, ensuring that only authorized users can access and modify their own snippets.
- **Sharing and Collaboration:** Share snippets with other developers by generating unique links, allowing for easy collaboration and discussion.
- **Caching with Redis:** Utilize Redis for caching to optimize the performance of the application, ensuring fast response times even during peak usage.

## Installation

Follow these steps to set up and run the Code Snippet Manager on your local environment:

Clone the repository:

```bash
git clone https://github.com/basemax/CodeShareHubLaravelGraphQL.git
cd CodeShareHubLaravelGraphQL
```

Install dependencies using Composer:

```bash
composer install
```

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Configure your database settings in the `.env` file.

Set up Redis for caching by providing the necessary Redis connection details in the .env file.

Generate the application key:

```bash
php artisan key:generate
```

Run database migrations:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

Access the application via your browser at `http://localhost:8000`.

## Usage

- Register for an account or log in if you already have one.
- Once logged in, you can create, view, edit, and delete your code snippets.
- Utilize the GraphQL API at /graphql to interact with the system programmatically. Refer to the API documentation for available queries and mutations.
- To share a snippet, generate a shareable link and share it with other developers. They can access and discuss the snippet through the provided link.

## Contributing

- Contributions to the Code Snippet Manager project are welcome! To contribute:
- Fork the repository.
- Create a new branch for your feature or bug fix.
- Implement your changes and ensure all tests pass.
- Submit a pull request to the main repository, describing your changes and their purpose.

## License

This project is licensed under the GPL-3.0 License - see the LICENSE file for details.

Copyright 2023, Max Base
