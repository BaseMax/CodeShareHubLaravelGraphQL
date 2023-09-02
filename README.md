# Code Snippet Manager GraphQL Laravel

Code Snippet Manager is a tool designed to simplify the process of managing and sharing code snippets among developers. It leverages Laravel 10, PHP 8.2, and Redis for caching to provide an efficient and user-friendly platform for developers to store, retrieve, and collaborate on code snippets seamlessly.

## Features

- **GraphQL API:** The core of this tool is built around a GraphQL API, allowing developers to interact with the system using a flexible and powerful query language.
- **Snippet Management:** Easily create, update, delete, and retrieve code snippets. Each snippet is associated with metadata such as title, description, tags, and language for efficient organization.
- **Search and Filtering:** Quickly find the snippets you need using search queries and filtering options based on tags, language, and more.
- **User Authentication:** Secure user authentication and authorization are integrated, ensuring that only authorized users can access and modify their own snippets.
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

## GraphQL Queries and Mutations

| Operation             | Description                                         | Example Usage                                           |
|-----------------------|-----------------------------------------------------|---------------------------------------------------------|
| **Queries**           |                                                     |                                                         |
| `getUser`             | Get user information by ID                          | `getUser(id: ID!): User`                                |
| `getSnippet`          | Get snippet by ID                                   | `getSnippet(id: ID!): Snippet`                          |
| `searchSnippets`      | Search snippets based on filters                    | `searchSnippets(filters: SnippetFilters!): [Snippet]`   |
| `getAllTags`          | Get a list of all available tags                    | `getAllTags: [String]`                                 |
| `getUserSnippets`     | Get all snippets created by a user                  | `getUserSnippets(userID: ID!): [Snippet]`               |
| `getTopRatedSnippets` | Get top-rated snippets by star rating               | `getTopRatedSnippets(limit: Int!): [Snippet]`           |
| `getSnippetComments`  | Get comments associated with a snippet              | `getSnippetComments(snippetID: ID!): [Comment]`         |
| **Mutations**         |                                                     |                                                         |
| `createUser`          | Create a new user                                   | `createUser(input: CreateUserInput!): User`             |
| `createSnippet`       | Create a new snippet                                | `createSnippet(input: CreateSnippetInput!): Snippet`    |
| `updateSnippet`       | Update an existing snippet                          | `updateSnippet(id: ID!, input: UpdateSnippetInput!): Snippet` |
| `deleteSnippet`       | Delete a snippet by ID                              | `deleteSnippet(id: ID!): Boolean`                      |
| `addTagToSnippet`     | Add a tag to a snippet                              | `addTagToSnippet(snippetID: ID!, tag: String!): Snippet` |
| `removeTagFromSnippet` | Remove a tag from a snippet                         | `removeTagFromSnippet(snippetID: ID!, tag: String!): Snippet` |
| `shareSnippet`        | Generate a shareable link for a snippet             | `shareSnippet(snippetID: ID!): String`                 |
| `rateSnippet`         | Rate a snippet with a star value                    | `rateSnippet(snippetID: ID!, rating: Int!): Snippet`    |
| `createComment`       | Create a comment on a snippet                       | `createComment(snippetID: ID!, text: String!): Comment` |
| `deleteComment`       | Delete a comment by ID                              | `deleteComment(id: ID!): Boolean`                      |
| `flagComment`         | Flag a comment as inappropriate                     | `flagComment(commentID: ID!): Comment`                 |
| `approveSnippet`      | Approve a snippet pending review                    | `approveSnippet(snippetID: ID!): Snippet`              |
| `createReview`        | Create a review for a snippet                       | `createReview(snippetID: ID!, rating: Int!, text: String!): Review` |
| `updateReview`        | Update an existing review                           | `updateReview(reviewID: ID!, rating: Int!, text: String!): Review` |
| `deleteReview`        | Delete a review by ID                               | `deleteReview(id: ID!): Boolean`                       |
| `addCollaborator`     | Add a collaborator to a snippet                    | `addCollaborator(snippetID: ID!, userID: ID!): Snippet` |
| `removeCollaborator`  | Remove a collaborator from a snippet               | `removeCollaborator(snippetID: ID!, userID: ID!): Snippet` |
| `forkSnippet`         | Fork an existing snippet to create a new one       | `forkSnippet(snippetID: ID!): Snippet`                 |
| `tagSuggestion`       | Suggest tags based on snippet content              | `tagSuggestion(snippetID: ID!): [String]`              |

## GraphQL

```graphql
type User {
  id: ID!
  username: String!
  email: String!
  snippets: [Snippet]
}

type Snippet {
  id: ID!
  title: String!
  description: String!
  code: String!
  language: String!
  tags: [String]
  owner: User!
  collaborators: [User]
  ratings: [Review]
  comments: [Comment]
}

type Comment {
  id: ID!
  text: String!
  user: User!
  snippet: Snippet!
}

type Review {
  id: ID!
  rating: Int!
  text: String!
  user: User!
  snippet: Snippet!
}

type Collaborator {
  id: ID!
  user: User!
  snippet: Snippet!
}

input CreateUserInput {
  username: String!
  email: String!
  # Other user input fields
}

input CreateSnippetInput {
  title: String!
  description: String!
  code: String!
  language: String!
  tags: [String]
}

input UpdateSnippetInput {
  title: String
  description: String
  code: String
  language: String
  tags: [String]
}

type Query {
  getUser(id: ID!): User
  getSnippet(id: ID!): Snippet
  searchSnippets(filters: SnippetFilters!): [Snippet]
  getAllTags: [String]
  getUserSnippets(userID: ID!): [Snippet]
  getTopRatedSnippets(limit: Int!): [Snippet]
  getSnippetComments(snippetID: ID!): [Comment]
  searchSnippetsWithOptions(options: SearchOptions!): SearchResult
  getUserByUsername(username: String!): User
  getSnippetByTitle(title: String!): Snippet
  # Other queries
}

input SnippetFilters {
  tags: [String]
  language: String
  # Other filtering fields
}

input EditUserInput {
  username: String
  email: String
  # Other user editable fields
}

type Subscription {
  snippetCreated: Snippet
  commentAdded(snippetID: ID!): Comment
  reviewAdded(snippetID: ID!): Review
}

type Comment {
  id: ID!
  text: String!
  user: User!
  snippet: Snippet!
  isFlagged: Boolean
}

type FlaggedComment {
  id: ID!
  originalComment: Comment!
  reason: String!
}

enum SortDirection {
  ASC
  DESC
}

input SearchOptions {
  query: String!
  sortBy: String
  sortDirection: SortDirection
  limit: Int
}

type SearchResult {
  items: [Snippet]
  totalCount: Int
}

type Mutation {
  createUser(input: CreateUserInput!): User
  createSnippet(input: CreateSnippetInput!): Snippet
  updateSnippet(id: ID!, input: UpdateSnippetInput!): Snippet
  deleteSnippet(id: ID!): Boolean
  addTagToSnippet(snippetID: ID!, tag: String!): Snippet
  removeTagFromSnippet(snippetID: ID!, tag: String!): Snippet
  shareSnippet(snippetID: ID!): String
  rateSnippet(snippetID: ID!, rating: Int!): Snippet
  createComment(snippetID: ID!, text: String!): Comment
  deleteComment(id: ID!): Boolean
  flagComment(commentID: ID!): Comment
  approveSnippet(snippetID: ID!): Snippet
  createReview(snippetID: ID!, rating: Int!, text: String!): Review
  updateReview(reviewID: ID!, rating: Int!, text: String!): Review
  deleteReview(id: ID!): Boolean
  addCollaborator(snippetID: ID!, userID: ID!): Snippet
  removeCollaborator(snippetID: ID!, userID: ID!): Snippet
  forkSnippet(snippetID: ID!): Snippet
  tagSuggestion(snippetID: ID!): [String]
  deleteCollaborator(snippetID: ID!, userID: ID!): Snippet
  createTag(tagName: String!): String
  editUser(id: ID!, input: EditUserInput!): User
  editComment(id: ID!, newText: String!): Comment
  createFlaggedComment(snippetID: ID!, text: String!): Comment
  # Other mutations
}
```

## Contributing

- Contributions to the Code Snippet Manager project are welcome! To contribute:
- Fork the repository.
- Create a new branch for your feature or bug fix.
- Implement your changes and ensure all tests pass.
- Submit a pull request to the main repository, describing your changes and their purpose.

## License

This project is licensed under the GPL-3.0 License - see the LICENSE file for details.

Copyright 2023, Max Base
