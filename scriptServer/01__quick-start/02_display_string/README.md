# Display strings

Write a PHP script to display the following strings.

Sample Strings :

```html
Tomorrow I \'ll learn PHP global variables.
```

```html
This is a bad command : del c:\\*.*
```

String: A string is series of characters, where a character is the same as a byte. PHP supports a 256-character set, and hence does not offer native Unicode support.
Note: As of PHP 7.0.0, there are no particular restrictions regarding the length of a string on 64-bit builds. On 32-bit builds and in earlier versions, a string can be as large as up to 2GB (2147483647 bytes maximum).

A string literal can be specified in four different ways:

<ul>
<li>single quoted: The simplest way to specify a string is to enclose it in single quotes (the character ').</li>
<li>double quoted: The simplest way to specify a string is to enclose it in single quotes (the character ").</li>
<li>heredoc syntax: A third way to delimit strings is the heredoc syntax: <<<. After this operator, an identifier is provided, then a newline.</li>
<li>nowdoc syntax (since PHP 5.3.0): Nowdocs are to single-quoted strings what heredocs are to double-quoted strings. A nowdoc is specified similarly to a heredoc, but no parsing is done inside a nowdoc.</li>
</ul>