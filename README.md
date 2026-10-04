# Somalia EAC Affairs (QA)

Public prototype for `qa.eacsomalia.gov.so` — a national gateway for Somalia’s East African Community (EAC) affairs under the Ministry of Foreign Affairs & International Cooperation.

## Local

PHP built-in server:

```bash
php -S 127.0.0.1:8091 -t . router.php
```

Apache (this folder under `/var/www/html`): [http://localhost/eacsomalia/qa.eacsomalia.gov.so/](http://localhost/eacsomalia/qa.eacsomalia.gov.so/)

## Content files

- `data/site.json` — homepage, news, tracker, opportunities, events, leadership
- `data/pages.json` — inner pages
- `data/i18n.json` — EN / SO / SW labels

Form submissions are stored in `submissions/` (not tracked in git).

## Under construction (`/wuc`)

Countdown landing page (copied from the public `eacsomalia.gov.so` construction site):

- Local: [http://localhost/eacsomalia/qa.eacsomalia.gov.so/wuc/](http://localhost/eacsomalia/qa.eacsomalia.gov.so/wuc/)
- PHP server: [http://127.0.0.1:8091/wuc/](http://127.0.0.1:8091/wuc/)

---

## Literature review & reference websites

This QA portal was shaped by reviewing official EAC and Partner State government websites — especially national **EAC Affairs / MEAC / MFA** portals — plus Somalia’s own MFA presence. The goal is a government-grade information and services gateway, not a private marketing site.

### Primary Somalia references

| Source | URL | What we took from it |
| --- | --- | --- |
| MFA Somalia (main) | [https://web.mfa.gov.so/](https://web.mfa.gov.so/) | Institutional branding, ministry hierarchy, official links, contact patterns, leadership pages |
| MFA — EAC Affairs | [https://web.mfa.gov.so/eac-affairs/](https://web.mfa.gov.so/eac-affairs/) | Mandate language for Somalia in the EAC; Partner State framing |
| MFA — State Minister in charge of EAC | [https://web.mfa.gov.so/st-minister-incharge-of-eac/](https://web.mfa.gov.so/st-minister-incharge-of-eac/) | Leadership profile for Hon. Ali Mohamed Omar (Ali Balcad); official portrait treatment |
| SONNA (state news) | [https://sonna.so/](https://sonna.so/) | Newsroom tone and EAC meeting photography for sample updates |

### EAC Secretariat & organs

| Source | URL | What we took from it |
| --- | --- | --- |
| EAC Secretariat | [https://www.eac.int/](https://www.eac.int/) | Integration pillars, Partner States list, official documents, press style |
| EAC e-Library / resources | [https://www.eac.int/resources](https://www.eac.int/resources) | Document library / treaties / protocols pattern |
| EAC Partner State MEAC contacts | [https://www.eac.int/media-contacts](https://www.eac.int/media-contacts) | Canonical list of national ministries responsible for EAC Affairs |
| EAC press example (Somalia accession path) | [We are ready to join the Community…](https://www.eac.int/press-releases/151-international-relations/2624-we-are-ready-to-join-the-community%2C-somalia-president-says) | Presidential / Summit narrative and archival photography |

### Partner State EAC Affairs websites (comparative review)

These national sites are the main structural models for “what a country EAC portal should contain”:

| Partner State | Institution | URL |
| --- | --- | --- |
| Kenya | Ministry of East African Community, the ASALs and Regional Development | [https://www.meac.go.ke/](https://www.meac.go.ke/) / [https://meacard.go.ke/](https://meacard.go.ke/) |
| Uganda | Ministry of East African Community Affairs (MEACA) | [https://www.meaca.go.ug/](https://www.meaca.go.ug/) |
| Tanzania | Ministry of Foreign Affairs and East African Cooperation | [https://www.foreign.go.tz/](https://www.foreign.go.tz/) |
| Rwanda | Ministry of Foreign Affairs and International Cooperation (MINAFFET) | [https://www.minaffet.gov.rw/](https://www.minaffet.gov.rw/) |
| Burundi | Ministry of East African Community Affairs, Youth, Sports and Culture | [https://www.meac.gov.bi/](https://www.meac.gov.bi/) |
| South Sudan | South Sudan EAC Secretariat (contacts via EAC directory) | See [EAC media contacts](https://www.eac.int/media-contacts) |
| DRC | Ministry of Regional Integration (contacts via EAC directory) | See [EAC media contacts](https://www.eac.int/media-contacts) |

### Content areas this portal is expected to cover

Drawn from MFA Somalia, EAC Secretariat pages, and Partner State MEAC/MFA sites, a national EAC Affairs portal typically needs:

1. **About EAC & Somalia’s membership** — Treaty context, accession story, what Partner State status means  
2. **Leadership & coordination** — Minister / State Minister responsible for EAC; national coordination  
3. **Integration pillars / tracker** — Customs Union, Common Market, Monetary Union, Political Confederation (progress, owners, deadlines)  
4. **Trade & business services** — trading guidance, documents, tariffs, standards, border procedures, **NTB reporting**  
5. **Citizen mobility** — travel/passport notes, work & residence, study  
6. **Opportunities** — scholarships, jobs, tenders, training  
7. **Documents / e-library** — treaties, protocols, national notices, links to EAC resources  
8. **News & events** — national EAC updates, forums, consultations  
9. **Representation** — EALA, EACJ, how citizens contact representatives  
10. **Official links** — MFA, EAC Secretariat, Partner State MEAC sites, gazette / legal sources  
11. **Multilingual UI** — at least English + national language(s); this QA site uses **EN / SO / SW**  
12. **Contact & accessibility** — MFA HQ details, hours, privacy / terms / accessibility footers  

### Design / IA notes from the review

- Partner State portals usually lead with **ministry identity + national emblem**, a utility bar (language, accessibility), and service-oriented quick links.  
- Kenya’s MEAC and Uganda’s MEACA emphasise **integration programmes, news, and citizen information**.  
- Rwanda’s MINAFFET and Tanzania’s Foreign Affairs sites emphasise **foreign policy + cooperation**, with EAC nested under wider diplomacy — Somalia’s model (EAC under MFA) is closest to that pattern, via [web.mfa.gov.so](https://web.mfa.gov.so/).  
- EAC Secretariat remains the authoritative source for **Community-level instruments**; national portals should deep-link rather than duplicate.

### Photo & news sources used in this QA build

- [SONNA — Somalia solidifies integration into EAC…](https://sonna.so/en/article/somalia-solidifies-integration-into-east-african-community-at-high-level-meetings)  
- [EAC — We are ready to join the Community, Somalia President says](https://www.eac.int/press-releases/151-international-relations/2624-we-are-ready-to-join-the-community%2C-somalia-president-says)  
- Official MFA State Minister portrait: [St. Minister in charge of EAC](https://web.mfa.gov.so/st-minister-incharge-of-eac/)

> **Note:** This is a QA prototype. Sample news and tracker figures are illustrative until replaced with approved MFA / EAC Affairs content.
