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
    {{#if service-json}}
    <script data-element="metatag" type="application/ld+json">
      {
        "name": "Iscrizione alla Scuola dell’infanzia",
        "serviceType": "P1Y",
        "serviceOperator": {
          "name": "Lorem"
        },
        "areaServed": {
          "name": "Lorem ipsum"
        },
        "audience": {
          "name": "Lorem ipsum"
        },
        "availableChannel": {
          "serviceUrl": "Lorem ipsum",
          "serviceLocation": {
            "name": "Lorem ipsum",
            "address": {
              "streetAddress": "Lorem ipsum",
              "postalCode": "Lorem ipsum",
              "addressLocality": "Lorem ipsum"
            }
          }
        }
      }
    </script>
    {{/if}}
  </head>

  <body>
    <div class="skiplink">
      <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
      <a class="visually-hidden-focusable" href="#footer">Vai al
        footer</a>
      </ul>
    </div><!-- /skiplink -->
    {{#if headerActive1}}
      {{> header/header logged=logged active1=headerActive1}}
    {{else}}
      {{#if headerActive2}}
        {{> header/header logged=logged active2=headerActive2}}
      {{else}}
        {{#if headerActive3}}
          {{> header/header logged=logged active3=headerActive3}}
        {{else}}
          {{#if headerActive4}}
            {{> header/header logged=logged active4=headerActive4}}
          {{else}}
            {{> header/header logged=logged}}
          {{/if}}
        {{/if}}
      {{/if}}
    {{/if}}
    {{> @partial-block}}
    {{> cmp-modal/modal-header-search}}
    {{>cmp-footer/cmp-footer}}

    {{#if path}}
    <script>window.__PUBLIC_PATH__ = "{{path}}assets/bootstrap-italia/dist/fonts"</script>
    <script src="{{path}}assets/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
    {{else}}
    <script>window.__PUBLIC_PATH__ = "../assets/bootstrap-italia/dist/fonts"</script>
    <script src="../assets/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
    {{/if}}
  </body>

</html>