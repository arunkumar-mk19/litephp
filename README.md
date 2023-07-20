# LitePHP - A Lightweight PHP Framework

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

LitePHP is a lightweight and minimalistic PHP framework designed to simplify web development without the need for any third-party packages or dependencies. It provides the essential features for building small to medium-sized web applications, making it ideal for rapid development and learning purposes.

## Features

- **Minimalistic**: LitePHP follows a minimalist approach, keeping the core codebase clean and easy to understand.
- **No Third-Party Dependencies**: The framework is built from scratch, eliminating the need for external packages or libraries.
- **Routing**: LitePHP includes a simple and efficient router that allows you to define routes and handle HTTP requests easily.
- **MVC Architecture**: The framework promotes the Model-View-Controller (MVC) pattern, making it easier to organize your code and maintain separation of concerns.
- **Database Abstraction**: LitePHP provides a basic database layer, allowing you to interact with databases without the need for an ORM.
- **Configurable**: Customize the framework according to your needs, as it's easy to configure and extend.
- **Built-in Templating**: LitePHP comes with a simple templating engine, enabling you to separate HTML from your PHP logic.
- **Error Handling**: The framework has a straightforward error handling mechanism, making debugging more manageable.

## Requirements

- PHP 7.4 or higher

## Installation

1. Clone the LitePHP repository or download the latest release from GitHub.
2. Upload the files to your web server or run locally using a development environment.

## Getting Started

1. Define your routes in the `routes.php` file, mapping URLs to controller actions.
2. Create controllers in the `controllers` directory to handle the logic for each route.
3. Create views in the `views` directory to display the content to the user.
4. Use the built-in templating engine to render views from your controllers.
5. Customize the configuration in the `config.php` file according to your application needs.

## Example

```php
// routes.php

use LitePHP\Route;

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
```

```php
// controllers/HomeController.php

namespace App\Controllers;

use LitePHP\View;

class HomeController
{
    public function index()
    {
        return View::render('home');
    }

    public function about()
    {
        return View::render('about');
    }
}
```

## License

LitePHP is open-source software licensed under the MIT License. Feel free to use, modify, and distribute it as per the terms of the license.

## Contribution

We welcome contributions to LitePHP! If you find any bugs or have suggestions for improvement, please submit an issue or create a pull request on our GitHub repository.

Happy coding with LitePHP!