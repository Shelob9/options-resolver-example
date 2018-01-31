Example WordPress plugin showing how to use the [OptionsResolver Component](https://symfony.com/doc/current/components/options_resolver.html) in a WordPress plugin.


```php
$popular = new \Example\PopularPosts( [ 'post_type' => 'post' ] );
$posts = $popular->doQuery()->getQuery()->get_posts();
```

```php
$author = new \Example\AuthorPosts( [ 'author' => 2 ]  );
$posts = $author->getQuery()->get_posts();

```