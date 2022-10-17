<!doctype html>
<html lang="it">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ htmlWebpackPlugin.options.description }}" />
    {{#if path}}
    <link rel="stylesheet" href="{{path}}assets/bootstrap-italia/dist/css/bootstrap-italia-comuni.min.css">
    {{else}}
    <link rel="stylesheet" href="../assets/bootstrap-italia/dist/css/bootstrap-italia-comuni.min.css">
    {{/if}}
  </head>

  <body>

    {{> @partial-block}}

    {{#if path}}
    <script>window.__PUBLIC_PATH__ = "{{path}}assets/bootstrap-italia/dist/fonts"</script>
    <script src="{{path}}assets/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
    {{else}}
    <script>window.__PUBLIC_PATH__ = "../assets/bootstrap-italia/dist/fonts"</script>
    <script src="../assets/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
    {{/if}}
  </body>

</html>