# 🌐 mimimiplatform – API-Schnittstellenübersicht (v1)

Diese Übersicht dokumentiert die geplanten API-Endpunkte für mimimiplatform. Die erste Version basiert auf einer klassischen Blade-Frontend-Architektur mit Laravel als Backend, ist jedoch API-ready für spätere Flutter-/SPA-Erweiterungen.

---

## 🔐 Authentifizierung (JWT / Sanctum)

| Methode | Endpoint        | Beschreibung                   | Auth erforderlich |
|---------|------------------|--------------------------------|-------------------|
| POST    | /api/login       | Login via E-Mail & Passwort    | Nein              |
| POST    | /api/register    | Registrierung                  | Nein              |
| POST    | /api/logout      | Logout & Token löschen         | ✅ Ja             |
| GET     | /api/user        | Aktueller User (Profil)        | ✅ Ja             |

---

## 📤 MiMiMi einreichen & anzeigen

| Methode | Endpoint              | Beschreibung                         | Auth erforderlich |
|---------|------------------------|--------------------------------------|-------------------|
| POST    | /api/mimimis           | Neues MiMiMi einreichen              | Optional (Gast/Token) |
| GET     | /api/mimimis           | Alle freigegebenen MiMiMis anzeigen | Nein              |
| GET     | /api/mimimis/{id}      | Einzelnes MiMiMi anzeigen           | Nein              |

---

## 🧑‍⚖️ Admin / Moderation

| Methode | Endpoint                       | Beschreibung                          | Auth erforderlich |
|---------|---------------------------------|---------------------------------------|-------------------|
| GET     | /api/admin/mimimis             | Alle MiMiMis (auch nicht freigegeben) | ✅ Admin          |
| POST    | /api/admin/mimimis/{id}/approve| MiMiMi freigeben                      | ✅ Admin          |
| DELETE  | /api/admin/mimimis/{id}        | MiMiMi löschen                        | ✅ Admin          |
| POST    | /api/admin/mimimis/{id}/highlight | Als „MiMiMi der Woche“ markieren  | ✅ Admin          |

---

## ⭐ Interaktionen & Community (Phase 2)

| Methode | Endpoint                         | Beschreibung                         | Auth erforderlich |
|---------|-----------------------------------|--------------------------------------|-------------------|
| POST    | /api/mimimis/{id}/react          | Reaktion (z. B. +1 Mitleid)          | Optional          |
| GET     | /api/mimimis/{id}/reactions      | Reaktionsübersicht                   | Nein              |
| POST    | /api/mimimis/{id}/comments       | Kommentar hinzufügen                 | ✅ Ja             |
| GET     | /api/mimimis/{id}/comments       | Kommentare anzeigen                  | Nein              |

---

## 🏆 Specials

| Methode | Endpoint              | Beschreibung                      | Auth erforderlich |
|---------|------------------------|-----------------------------------|-------------------|
| GET     | /api/highlight         | Aktuelles "MiMiMi der Woche"     | Nein              |
| GET     | /api/statistics        | MiMiMi-Statistik (optional)       | Nein              |

---

## 🧱 Hinweise zur Umsetzung

- Blade-Frontend nutzt größtenteils Controller-Routing, kann aber bei Bedarf API-Routen (prefix `/api`) zusätzlich bedienen.
- Auth via Sanctum mit optionalem Token für Flutter/WebApp später
- Datenstruktur basiert auf dem `MiMiMi` Model (siehe Laravel Models)
- API-Versionierung geplant (`/api/v1/...`)

---

## 📬 Kontakt / Änderungen

Du möchtest Endpunkte vorschlagen oder testen? Öffne ein Issue oder melde dich bei `tbd`
