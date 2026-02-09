# Errorhelper

*A tiny PHP helper for telling clients “no” - politely, in XML or JSON.*

---

## What is this?

`Errorhelper` is a **no-nonsense error response helper** for PHP projects that:

* speak **XML**
* speak **JSON**

If an error happens, this library:

1. Sets the HTTP status code
2. Sends a proper `Content-Type`
3. Outputs structured XML or JSON
4. **Exits immediately** (no awkward after-error behavior)

---

## Installation

Just drop it somewhere sensible:

```php
require_once __DIR__ . '/errorhelper.php';
```

That’s it. No composer. No rituals.

---

## Usage

### XML error

```php
xml_error(404, 'File not found', [
    'path' => '/assets/secret.pdf'
]);
```

**Response:**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<error>
  <code>404</code>
  <message>File not found</message>
  <details>
    <path>/assets/secret.pdf</path>
  </details>
</error>
```

### JSON error

```php
json_error(401, 'Unauthorized', [
    'auth' => 'Bearer required'
]);
```

**Response:**

```json
{
    "success": "false",
    "errors": {
        "code": 401,
        "message": "Unauthorized",
        "details": {
            "auth": "Bearer required"
        }
    }
}
```

---

## Requirements

- PHP 8.1 or newer

---

## When to use this

Perfect for:

* APIs
* filesystems
* authentication & validation
* “how did you even get here?” moments

Not meant for:

* successful responses

---

*no chatgpt was harmed while making parts of this readme.md*
