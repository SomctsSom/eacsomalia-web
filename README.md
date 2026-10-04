# Somalia EAC Affairs (QA)

Public prototype for `qa.eacsomalia.gov.so`.

## Local

PHP built-in server:

```bash
php -S 127.0.0.1:8091 -t . router.php
```

Apache (this folder under `/var/www/html`): [http://localhost/eacsomalia/qa.eacsomalia.gov.so/](http://localhost/eacsomalia/qa.eacsomalia.gov.so/)

## Content

- `data/site.json` — homepage, news, tracker, opportunities
- `data/pages.json` — inner pages
- `data/i18n.json` — EN / SO / SW labels

Form submissions are stored in `submissions/` (not tracked in git).

## Under construction (`/wuc`)

Countdown landing page (copied from the public `eacsomalia.gov.so` construction site):

- Local: [http://localhost/eacsomalia/qa.eacsomalia.gov.so/wuc/](http://localhost/eacsomalia/qa.eacsomalia.gov.so/wuc/)
- PHP server: [http://127.0.0.1:8091/wuc/](http://127.0.0.1:8091/wuc/)
