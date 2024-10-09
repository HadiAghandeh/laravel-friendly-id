
# Laravel Friendly ID Package

![Laravel Friendly ID](image.jpg)

Looking to generate user-friendly, Google Meet-style URLs in your Laravel application? Our Laravel package provides a trait to create and decode "friendly" string representations of model IDs, perfect for hiding integer IDs in URLs without storing a URL slug in a separate column.

This package is designed to enhance the readability of URLs by obfuscating integer IDs. It reduces the length of identifiers while creating clean, aesthetically pleasing URL formats like `xxx-xxxx-xxx`, which may appear random but simply represent integer IDs stored in the database. This approach offers simplicity, elegance, and a better user experience, especially when creating Google Meet-style URLs or friendly ID URLs.

If you're looking for a way to transform integer IDs into encrypted strings to improve URL readability, this package is the perfect fit.
## Default Usage
```php 
// use the trait
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HadiAghandeh\FriendlyId\Traits\FriendlyId;

class Post extends Model
{
    use FriendlyId;
}

// get encoded id
$post = Post::find(1);
$friendlyId = $post->friendly_id // = xxx-xxxx-xxx

// find the model
$post = Post::whereFriendlyId($friendlyId);
```
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
 /*
     |--------------------------------------------------------------------------
     | Alphabets
     |--------------------------------------------------------------------------
     |
     | provide a alphabet string it is best if you provide a string with randomized order
     |
     */
    'alphabet' => env('FRIENDLY_ID_ALPHABET', "abcdefghijklmnopqrstuvwxyz"),

    /*
     |--------------------------------------------------------------------------
     | Encoder Name
     |--------------------------------------------------------------------------
     |
     | available option BASEN, SQIDS and WORDS
     |
     */
    'encoder' => env('FRIENDLY_ID_ENCODER', 'SQIDS'),

    /*
     |--------------------------------------------------------------------------
     | Minimum length
     |--------------------------------------------------------------------------
     |
     | This option controls the minimum length of the encoded string
     |
     */
    'length' => env('FRIENDLY_ID_LENGTH', 10),

    /*
     |--------------------------------------------------------------------------
     | Default column
     |--------------------------------------------------------------------------
     |
     | This option controls the default column that friendly id uses
     |
     */
    'column' => env('FRIENDLY_ID_COLUMN', 'id'),
];
```

- `alphabet`: The set of characters used to encode the ID. By default, it uses `"abcdefghijklmnopqrstu"`. You can modify it via environment variables.
- `encoder`: The encoder algorithm used to create friendly IDs. The default encoder is `"SQIDS"`. You can change this through the `FRIENDLY_ID_ENCODER` environment variable. available encoders are `BASEN` and `SQIDS`

## Encoders
### BASEN
This changes the base of the integer to letters provided by FRIENDLY_ID_ALPHABET.

Example output with a length of 7:
```angular2html
124 -> ctt-rctz 
125 -> ctt-rcty
50000 -> ctt-tyrj
50001 -> ctt-tyri
50002 -> ctt-tyrh
100000 -> ctt-pfwd
100001 -> ctt-pfwc
100002 -> ctt-pfwb
1000000 -> ctv-oodv
1000000000 -> ndh-nmh
1000000001 -> ndh-nmg
```

### SQIDS
This uses the well-known Sqids algorithm with its PHP package.

Example output with a length of 10:
```angular2html
100002 -> esz-xmrs-alo 
1000000 -> msw-pppt-ozp 
1000000000 -> uyr-vkkk-kgq
1000000001 -> gmx-qeee-rkr
1000000002 -> mqs-dppp-sto
1256541245 -> vdb-ryev-tqc
1000000000000 -> mzj-rppp-ppp
12545656455156 -> etv-cbxc-lts-s
```

### WORDS
Sometimes, you may prefer your string to be a mix of words. These strings are easier to remember due to their use of vowels.
```angular2html
50001 -> hem-ho
50002 -> nap-pan
100000 -> rich-feet
100001 -> land-sum
100002 -> like-big
1000000 -> wine-safe-farm
```
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

# Support
If this package helps you, please consider giving it a ⭐ on GitHub! Your support means a lot and helps to maintain this project.