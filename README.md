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
