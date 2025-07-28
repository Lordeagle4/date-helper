# 🕒 AWTECHS DateHelper

![Packagist Version](https://img.shields.io/packagist/v/awtechs/date-helper?style=flat-square)
![Downloads](https://img.shields.io/packagist/dt/awtechs/date-helper?style=flat-square)
![License](https://img.shields.io/github/license/Lordeagle4/date-helper?style=flat-square)
![Stars](https://img.shields.io/github/stars/Lordeagle4/date-helper?style=flat-square)

**AWTECHS DateHelper** is a timezone-aware, business-week-friendly date utility package for Laravel.
It simplifies formatting dates in Blade using expressive components and directives.

---

## 📦 Features

* ✅ Human-readable time differences (`2 hours ago`, `in 3 days`)
* ✅ Flexible date formatting with timezone awareness
* ✅ Clean Blade components (`<x-date.human>`, `<x-date.format>`)
* ✅ Blade directives for quick inline use
* ✅ Works out of the box with Laravel 9, 10, 11
* ✅ Auto-discovered via Laravel package discovery

---

## 🚀 Installation

```bash
composer require awtechs/date-helper
```

Laravel will auto-register the package via service discovery.
If needed, you may add it manually in `config/app.php`:

```php
'providers' => [
    Awtechs\DateHelper\DateHelperServiceProvider::class,
],
```

---

## 🧩 Blade Components

### 1. `<x-date.human>`

Renders a human-readable time difference (like `3 hours ago`).

```blade
<x-date.human :value="$post->created_at" />
```

Output:

```html
<span>3 hours ago</span>
```

---

### 2. `<x-date.format>`

Custom date formatting (with timezone support).

```blade
<x-date.format :value="$invoice->due_date" format="d M, Y" />
```

Output:

```html
<span>28 Jul, 2025</span>
```

---

## 🧠 Blade Directives

Use these directly in your Blade files.

### `@human($date)`

```blade
@human($user->created_at)
```

Output:

```
5 minutes ago
```

---

### `@format($date, $format)`

```blade
@format($order->shipped_at, 'd/m/Y')
```

Output:

```
28/07/2025
```

---

## ⌛ Timezone Support

All output is localized to `Africa/Lagos` by default.

You can customize this by modifying the helper class or adding dynamic user-based timezones later.

---

## 💡 Example Use Case

```blade
<h4>Registered:</h4>
<x-date.human :value="$user->created_at" />

<h4>Due Date:</h4>
<x-date.format :value="$invoice->due_date" format="l, jS F Y" />
```

---

## 🧱 Directory Structure

```
src/
├── Components/
│   ├── Human.php
│   └── Format.php
├── Blade/
│   └── DateBladeDirectives.php
├── DateHelper.php
└── DateHelperServiceProvider.php

resources/
└── views/
    └── components/
        └── date/
            ├── human.blade.php
            └── format.blade.php
```

---

## 🌍 Publishing on Packagist

1. Push your package to a **public GitHub repository**
2. Visit [https://packagist.org/packages/submit](https://packagist.org/packages/submit)
3. Paste your repo URL: `https://github.com/awtechs/date-helper`
4. Click **Check** and then **Submit**
5. Done! 🎉

Ensure your repo has a valid `composer.json`, a license, and is tagged with `v1.0.0` or higher.

---

## 📄 License

MIT © [Michael Ugochukwu](mailto:eaglemike7@gmail.com) – AWTECHS
Contributions welcome!
