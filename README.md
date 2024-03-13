# Welcome to laravel-movie-app 👋

> A movie App using Laravel, Tailwind CSS and The Movie DB REST API

![laravel-movie-app](https://user-images.githubusercontent.com/57726726/158033034-ce5acd9b-e501-4593-b4a7-9e21d174b46c.gif)

## Technologies
- [Laravel](https://laravel.com)
- [Laravel Livewire](https://laravel-livewire.com)
- [View models in Laravel](https://github.com/spatie/laravel-view-models)
- [Tailwind CSS](https://tailwindcss.com)
- [Fontawesome](https://fontawesome.com)
- [Alpine.js](https://alpinejs.dev)
- [PurgeCSS](https://github.com/spatie/laravel-mix-purgecss)

## Install

1. Clone the project
```bash
  git clone https://github.com/luiz-moura/laravel-movie-app.git
```

2. Create .env
```bash
  cp .env.example .env
```

3. Start the server in background
```bash
  docker-compose up -d
```

4. Create aliases for sail bash path
```bash
  alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

5. Generate key
```bash
  sail artisan key:generate
```

6. Install NPM dependencies
```bash
  sail npm install && sail npm run dev
```

Project listen in port http://localhost:80

Set your `TMDB_TOKEN` in your `.env` file. You can get an API key [here](https://www.themoviedb.org/documentation/api). Make sure to use the "API Read Access Token (v4 auth)" from the TMDb dashboard.

## Author

👤 **Luiz Moura**

* Github: [@luiz-moura](https://github.com/luiz-moura)
* LinkedIn: [@luiz-moura](https://linkedin.com/in/luiz-moura)

## Credits

👤 **Andre Madarang**

* Github: [@drehimself](https://github.com/drehimself)
* Youtube: [Andre Madarang](https://www.youtube.com/channel/UCtb40EQj2inp8zuaQlLx3iQ)

## Show your support

Give a ⭐️ if this project helped you!


## 📝 License

Copyright © 2022 [Luiz Moura](https://github.com/luiz-moura).

This project is [MIT License](https://opensource.org/licenses/MIT) licensed.

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
