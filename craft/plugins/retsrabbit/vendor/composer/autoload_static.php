<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit44c7bd9f3aea755ebad778b54bbdd12c
{
    public static $files = array (
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
        ),
        'R' => 
        array (
            'RetsRabbit\\' => 11,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'L' => 
        array (
            'League\\Fractal\\' => 15,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'A' => 
        array (
            'Anecka\\RetsRabbit\\Transformers\\' => 31,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'RetsRabbit\\' => 
        array (
            0 => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'League\\Fractal\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/fractal/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Anecka\\RetsRabbit\\Transformers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/transforms',
        ),
    );

    public static $classMap = array (
        'Anecka\\RetsRabbit\\Transformers\\PhotoTransformer' => __DIR__ . '/../..' . '/transforms/PhotoTransformer.php',
        'Anecka\\RetsRabbit\\Transformers\\PropertyTransformer' => __DIR__ . '/../..' . '/transforms/PropertyTransformer.php',
        'GuzzleHttp\\Client' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Client.php',
        'GuzzleHttp\\ClientInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/ClientInterface.php',
        'GuzzleHttp\\Cookie\\CookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/CookieJar.php',
        'GuzzleHttp\\Cookie\\CookieJarInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/CookieJarInterface.php',
        'GuzzleHttp\\Cookie\\FileCookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/FileCookieJar.php',
        'GuzzleHttp\\Cookie\\SessionCookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/SessionCookieJar.php',
        'GuzzleHttp\\Cookie\\SetCookie' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/SetCookie.php',
        'GuzzleHttp\\Exception\\BadResponseException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/BadResponseException.php',
        'GuzzleHttp\\Exception\\ClientException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ClientException.php',
        'GuzzleHttp\\Exception\\ConnectException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ConnectException.php',
        'GuzzleHttp\\Exception\\GuzzleException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/GuzzleException.php',
        'GuzzleHttp\\Exception\\RequestException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/RequestException.php',
        'GuzzleHttp\\Exception\\SeekException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/SeekException.php',
        'GuzzleHttp\\Exception\\ServerException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ServerException.php',
        'GuzzleHttp\\Exception\\TooManyRedirectsException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/TooManyRedirectsException.php',
        'GuzzleHttp\\Exception\\TransferException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/TransferException.php',
        'GuzzleHttp\\HandlerStack' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/HandlerStack.php',
        'GuzzleHttp\\Handler\\CurlFactory' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlFactory.php',
        'GuzzleHttp\\Handler\\CurlFactoryInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlFactoryInterface.php',
        'GuzzleHttp\\Handler\\CurlHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlHandler.php',
        'GuzzleHttp\\Handler\\CurlMultiHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlMultiHandler.php',
        'GuzzleHttp\\Handler\\EasyHandle' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/EasyHandle.php',
        'GuzzleHttp\\Handler\\MockHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/MockHandler.php',
        'GuzzleHttp\\Handler\\Proxy' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/Proxy.php',
        'GuzzleHttp\\Handler\\StreamHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/StreamHandler.php',
        'GuzzleHttp\\MessageFormatter' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/MessageFormatter.php',
        'GuzzleHttp\\Middleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Middleware.php',
        'GuzzleHttp\\Pool' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Pool.php',
        'GuzzleHttp\\PrepareBodyMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/PrepareBodyMiddleware.php',
        'GuzzleHttp\\Promise\\AggregateException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/AggregateException.php',
        'GuzzleHttp\\Promise\\CancellationException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/CancellationException.php',
        'GuzzleHttp\\Promise\\Coroutine' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Coroutine.php',
        'GuzzleHttp\\Promise\\EachPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/EachPromise.php',
        'GuzzleHttp\\Promise\\FulfilledPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/FulfilledPromise.php',
        'GuzzleHttp\\Promise\\Promise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Promise.php',
        'GuzzleHttp\\Promise\\PromiseInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/PromiseInterface.php',
        'GuzzleHttp\\Promise\\PromisorInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/PromisorInterface.php',
        'GuzzleHttp\\Promise\\RejectedPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/RejectedPromise.php',
        'GuzzleHttp\\Promise\\RejectionException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/RejectionException.php',
        'GuzzleHttp\\Promise\\TaskQueue' => __DIR__ . '/..' . '/guzzlehttp/promises/src/TaskQueue.php',
        'GuzzleHttp\\Promise\\TaskQueueInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/TaskQueueInterface.php',
        'GuzzleHttp\\Psr7\\AppendStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/AppendStream.php',
        'GuzzleHttp\\Psr7\\BufferStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/BufferStream.php',
        'GuzzleHttp\\Psr7\\CachingStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/CachingStream.php',
        'GuzzleHttp\\Psr7\\DroppingStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/DroppingStream.php',
        'GuzzleHttp\\Psr7\\FnStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/FnStream.php',
        'GuzzleHttp\\Psr7\\InflateStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/InflateStream.php',
        'GuzzleHttp\\Psr7\\LazyOpenStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/LazyOpenStream.php',
        'GuzzleHttp\\Psr7\\LimitStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/LimitStream.php',
        'GuzzleHttp\\Psr7\\MessageTrait' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/MessageTrait.php',
        'GuzzleHttp\\Psr7\\MultipartStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/MultipartStream.php',
        'GuzzleHttp\\Psr7\\NoSeekStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/NoSeekStream.php',
        'GuzzleHttp\\Psr7\\PumpStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/PumpStream.php',
        'GuzzleHttp\\Psr7\\Request' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Request.php',
        'GuzzleHttp\\Psr7\\Response' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Response.php',
        'GuzzleHttp\\Psr7\\ServerRequest' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/ServerRequest.php',
        'GuzzleHttp\\Psr7\\Stream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Stream.php',
        'GuzzleHttp\\Psr7\\StreamDecoratorTrait' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/StreamDecoratorTrait.php',
        'GuzzleHttp\\Psr7\\StreamWrapper' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/StreamWrapper.php',
        'GuzzleHttp\\Psr7\\UploadedFile' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UploadedFile.php',
        'GuzzleHttp\\Psr7\\Uri' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Uri.php',
        'GuzzleHttp\\Psr7\\UriNormalizer' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UriNormalizer.php',
        'GuzzleHttp\\Psr7\\UriResolver' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UriResolver.php',
        'GuzzleHttp\\RedirectMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RedirectMiddleware.php',
        'GuzzleHttp\\RequestOptions' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RequestOptions.php',
        'GuzzleHttp\\RetryMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RetryMiddleware.php',
        'GuzzleHttp\\TransferStats' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/TransferStats.php',
        'GuzzleHttp\\UriTemplate' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/UriTemplate.php',
        'League\\Fractal\\Manager' => __DIR__ . '/..' . '/league/fractal/src/Manager.php',
        'League\\Fractal\\Pagination\\Cursor' => __DIR__ . '/..' . '/league/fractal/src/Pagination/Cursor.php',
        'League\\Fractal\\Pagination\\CursorInterface' => __DIR__ . '/..' . '/league/fractal/src/Pagination/CursorInterface.php',
        'League\\Fractal\\Pagination\\DoctrinePaginatorAdapter' => __DIR__ . '/..' . '/league/fractal/src/Pagination/DoctrinePaginatorAdapter.php',
        'League\\Fractal\\Pagination\\IlluminatePaginatorAdapter' => __DIR__ . '/..' . '/league/fractal/src/Pagination/IlluminatePaginatorAdapter.php',
        'League\\Fractal\\Pagination\\PagerfantaPaginatorAdapter' => __DIR__ . '/..' . '/league/fractal/src/Pagination/PagerfantaPaginatorAdapter.php',
        'League\\Fractal\\Pagination\\PaginatorInterface' => __DIR__ . '/..' . '/league/fractal/src/Pagination/PaginatorInterface.php',
        'League\\Fractal\\Pagination\\PhalconFrameworkPaginatorAdapter' => __DIR__ . '/..' . '/league/fractal/src/Pagination/PhalconFrameworkPaginatorAdapter.php',
        'League\\Fractal\\Pagination\\ZendFrameworkPaginatorAdapter' => __DIR__ . '/..' . '/league/fractal/src/Pagination/ZendFrameworkPaginatorAdapter.php',
        'League\\Fractal\\ParamBag' => __DIR__ . '/..' . '/league/fractal/src/ParamBag.php',
        'League\\Fractal\\Resource\\Collection' => __DIR__ . '/..' . '/league/fractal/src/Resource/Collection.php',
        'League\\Fractal\\Resource\\Item' => __DIR__ . '/..' . '/league/fractal/src/Resource/Item.php',
        'League\\Fractal\\Resource\\NullResource' => __DIR__ . '/..' . '/league/fractal/src/Resource/NullResource.php',
        'League\\Fractal\\Resource\\ResourceAbstract' => __DIR__ . '/..' . '/league/fractal/src/Resource/ResourceAbstract.php',
        'League\\Fractal\\Resource\\ResourceInterface' => __DIR__ . '/..' . '/league/fractal/src/Resource/ResourceInterface.php',
        'League\\Fractal\\Scope' => __DIR__ . '/..' . '/league/fractal/src/Scope.php',
        'League\\Fractal\\Serializer\\ArraySerializer' => __DIR__ . '/..' . '/league/fractal/src/Serializer/ArraySerializer.php',
        'League\\Fractal\\Serializer\\DataArraySerializer' => __DIR__ . '/..' . '/league/fractal/src/Serializer/DataArraySerializer.php',
        'League\\Fractal\\Serializer\\JsonApiSerializer' => __DIR__ . '/..' . '/league/fractal/src/Serializer/JsonApiSerializer.php',
        'League\\Fractal\\Serializer\\SerializerAbstract' => __DIR__ . '/..' . '/league/fractal/src/Serializer/SerializerAbstract.php',
        'League\\Fractal\\TransformerAbstract' => __DIR__ . '/..' . '/league/fractal/src/TransformerAbstract.php',
        'Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php',
        'Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php',
        'Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php',
        'Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php',
        'Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php',
        'Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php',
        'Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php',
        'RetsRabbit\\ApiResponse' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/ApiResponse.php',
        'RetsRabbit\\ApiService' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/ApiService.php',
        'RetsRabbit\\Bridges\\CraftBridge' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Bridges/CraftBridge.php',
        'RetsRabbit\\Bridges\\EEBridge' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Bridges/EEBridge.php',
        'RetsRabbit\\Bridges\\iCmsBridge' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Bridges/iCmsBridge.php',
        'RetsRabbit\\MediaResource\\MediaResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/MediaResource.php',
        'RetsRabbit\\QueryBuilder\\QueryBuilder' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/QueryBuilder.php',
        'RetsRabbit\\Resources\\OpenHousesResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/OpenHousesResource.php',
        'RetsRabbit\\Resources\\PropertiesResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/PropertiesResource.php',
        'RetsRabbit\\Resources\\ServersResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/ServersResource.php',
        'RetsRabbit\\Resources\\aResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/aResource.php',
        'RetsRabbit\\Resources\\iResource' => __DIR__ . '/..' . '/rets-rabbit/cms-plugin-core/src/Resources/iResource.php',
        'Symfony\\Component\\Yaml\\Command\\LintCommand' => __DIR__ . '/..' . '/symfony/yaml/Command/LintCommand.php',
        'Symfony\\Component\\Yaml\\Dumper' => __DIR__ . '/..' . '/symfony/yaml/Dumper.php',
        'Symfony\\Component\\Yaml\\Escaper' => __DIR__ . '/..' . '/symfony/yaml/Escaper.php',
        'Symfony\\Component\\Yaml\\Exception\\DumpException' => __DIR__ . '/..' . '/symfony/yaml/Exception/DumpException.php',
        'Symfony\\Component\\Yaml\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/symfony/yaml/Exception/ExceptionInterface.php',
        'Symfony\\Component\\Yaml\\Exception\\ParseException' => __DIR__ . '/..' . '/symfony/yaml/Exception/ParseException.php',
        'Symfony\\Component\\Yaml\\Exception\\RuntimeException' => __DIR__ . '/..' . '/symfony/yaml/Exception/RuntimeException.php',
        'Symfony\\Component\\Yaml\\Inline' => __DIR__ . '/..' . '/symfony/yaml/Inline.php',
        'Symfony\\Component\\Yaml\\Parser' => __DIR__ . '/..' . '/symfony/yaml/Parser.php',
        'Symfony\\Component\\Yaml\\Tag\\TaggedValue' => __DIR__ . '/..' . '/symfony/yaml/Tag/TaggedValue.php',
        'Symfony\\Component\\Yaml\\Unescaper' => __DIR__ . '/..' . '/symfony/yaml/Unescaper.php',
        'Symfony\\Component\\Yaml\\Yaml' => __DIR__ . '/..' . '/symfony/yaml/Yaml.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit44c7bd9f3aea755ebad778b54bbdd12c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit44c7bd9f3aea755ebad778b54bbdd12c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit44c7bd9f3aea755ebad778b54bbdd12c::$classMap;

        }, null, ClassLoader::class);
    }
}
