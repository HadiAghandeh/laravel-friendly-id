
# Laravel Friendly ID Package

A Laravel package that provides a trait to generate and decode "friendly" string representations of model IDs. This can be useful for improving the readability of URLs, reducing the length of identifiers, and enhancing security by obfuscating integer IDs.

We appreciate URL formats like `afr-sdgf-dfg`, which appear to be random yet aesthetically pleasing. Despite their seemingly complex structure, they simply represent an integer ID stored in the database. This type of encoding offers both simplicity and elegance, making it highly useful in various scenarios, especially when you want to obfuscate model IDs while maintaining readable and user-friendly URLs such as Google meet URLs.
## Installation

Install the package via Composer:

```bash
composer require hadi-aghandeh/laravel-friendly-id
```

### Configuration

After installing the package, publish the configuration file:

```bash
php artisan vendor:publish --tag="friendly-id"
```

This will create a `config/friendly-id.php` file where you can customize the encoding settings.

### Default Configuration

```php
return [
    'alphabet' => env('FRIENDLY_ID_ALPHABET', "abcdefghijklmnopqrstu"),
    'encoder' => env('FRIENDLY_ID_ENCODER', 'SQIDS'),
];
```

- `alphabet`: The set of characters used to encode the ID. By default, it uses `"abcdefghijklmnopqrstu"`. You can modify it via environment variables.
- `encoder`: The encoder algorithm used to create friendly IDs. The default encoder is `"SQIDS"`. You can change this through the `FRIENDLY_ID_ENCODER` environment variable. available encoders are `BASEN` and `SQIDS`

## Usage

To start using friendly IDs in your Laravel models, simply use the `FriendlyId` trait in your model class.

### Example

#### Add Trait to a Model

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HadiAghandeh\FriendlyId\Traits\FriendlyId;

class Post extends Model
{
    use FriendlyId;
}
```

#### Encode and Decode Friendly IDs

You can now use the `encodeFriendlyId` method to generate a friendly string representation of the model's ID:

```php
$post = Post::find(1);
$friendlyId = $post->encodeFriendlyId();

echo $friendlyId; // e.g., "abc-def-ghi"
```

To decode a friendly ID back to the original integer ID, use the `decodeFriendlyId` method:

```php
$decodedId = Post::decodeFriendlyId('abc-def-ghi');
echo $decodedId; // e.g., 1
```

#### Query by Friendly ID

You can use the `whereFriendlyId` scope to query a model by its friendly ID:

```php
$post = Post::whereFriendlyId('abc-def-ghi')->first();
```

### Configuration Customization

To customize the encoding behavior, you can update your `.env` file with the following environment variables:

```env
FRIENDLY_ID_ALPHABET=yourcustomalphabet
FRIENDLY_ID_ENCODER=yourencoder
```

- `FRIENDLY_ID_ALPHABET`: Defines the custom alphabet used to generate friendly IDs.
- `FRIENDLY_ID_ENCODER`: Defines the encoding mechanism to use. Currently, the default is `"SQIDS"`.

### Exception Handling

The `decodeFriendlyId` method will return `null` if the provided friendly ID is invalid or cannot be decoded.

```php
$invalidId = Post::decodeFriendlyId('invalid-id'); // returns null
```

## Testing

You can run tests for this package using PHPUnit:

```bash
vendor/bin/phpunit
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
