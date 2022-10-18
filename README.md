# Google Product Review Feeds Generator in PHP

This package can generate Google Product Review Feeds. It is based on
the [Google Product Review Feeds Specification](https://developers.google.com/product-review-feeds).

```php
        // Initialize the Feed object
        $feed = new Feed('Company Name', 'https://www.example.com/favicon.ico');

        //Add Review Object
        $feed->addReview({ReviewObject});
        $feed->addReview({ReviewObject});

        // Generate XML Feed
        $feed->generate()
```

## Example

To Generate Review xml feed, Product, Reviewer and Review data required.

To see generated xml feed from following
example [Click Here](https://raw.githubusercontent.com/jagdeepbanga/php-google-product-review-feeds/master/tests/Stub/ReviewXmlFeed.xml)
.

```php
        // Create Product Object
        $product = new ProductFeed();
        $product->setName('Product Name');
        $product->setGtin('1234567890123');
        $product->setSku('1234567890123');
        $product->setBrand('Brand Name');
        $product->setUrl('https://www.example.com/product/1');

        // Create Product Reviewer Object
        $reviewer = new ReviewerFeed();
        $reviewer->setName('John Doe');
        $reviewer->setId('234');

        // Create Product Review Object
        $review = new ReviewFeed();
        $review->setTimeStamp('2020-01-01T00:00:00+00:00');
        $review->setTitle('Excellent');
        $review->setId(123);
        $review->setUrl('https://www.example.com/review/123');
        $review->setRating(5);
        $review->setContent('This is a review');
        
        $review->addReviewer($reviewer); // Add Reviewer Object to Review Object
        $review->addProduct($product); // Add Product Object to Review Object

        // Initialize the Feed object
        $feed = new Feed('Company Name', 'https://www.example.com/favicon.ico');
        
        //Add Review Object
        $feed->addReview($review);

        // Generate XML Feed
        $feed->generate();
```

## Installation

You can install the package via composer:

```bash
composer require jagdeepbanga/php-google-product-review-feeds
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
