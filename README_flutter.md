# 📱 mimimiplatform Flutter App – README

Diese App ist die offizielle mobile und plattformübergreifende Erweiterung der **mimimiplatform**. Sie bietet Nutzern die Möglichkeit, ihre MiMiMis auch unterwegs einzureichen, zu stöbern, zu bewerten – und den "MiMiMi der Woche" gebührend zu feiern.

---

## 🚀 Ziele der Flutter-App

- Mobile-first Zugriff auf die Plattform
- Offline-Unterstützung mit späterer Synchronisation
- Native Features wie Push-Benachrichtigungen, Kamera-Upload (MiMiMi als Selfie!)
- Leichte Admin-Moderation unterwegs (Admin-Light)

---

## 📦 Geplante Funktionen

| Funktion                    | Status   | Beschreibung |
|-----------------------------|----------|--------------|
| MiMiMi einreichen          | ⬜ geplant | Formular, wie auf Website |
| Feed mit Filteroptionen    | ⬜ geplant | Nach Kategorie, Zeit, Beliebtheit |
| MiMiMi der Woche           | ⬜ geplant | Highlight + Animation |
| Reaktionen / Upvotes       | ⬜ geplant | "+1 Mitleid" etc. |
| Benutzer-Login             | ⬜ geplant | Mit JWT und SecureStorage |
| Admin-Light-Review         | ⬜ geplant | Nur für Moderatoren |
| Push-Benachrichtigungen    | ⬜ geplant | z. B. bei neuem Kommentar |
| Lokale Speicherung (offline)| ⬜ geplant | Beiträge lokal speichern & später senden |

---

## 🔧 Technisches Setup

- **Flutter SDK:** ≥ 3.19
- **State Management:** Riverpod (empfohlen) oder Provider
- **HTTP Client:** `dio` oder `http` Package
- **Auth:** JWT mit SecureStorage (`flutter_secure_storage`)
- **Routing:** `go_router`
- **Local DB:** `hive` oder `isar`

---

## 🔐 Authentifizierung

- Anbindung an Laravel-API mit Sanctum oder Passport
- Token wird gespeichert und bei App-Start validiert
- Optional: Login per OAuth (z. B. Discord, Google)

---

## 📱 Plattformen

| Plattform     | Status   |
|---------------|----------|
| Android       | ⬜ geplant |
| iOS           | ⬜ geplant |
| Web (Flutter) | ⬜ geplant |
| Windows/macOS | ⬜ geplant (später) |

---

## 🎨 Design

- Angelehnt an das Web-Branding: `#00B4D8`, `#FFC857`, `#1B1B1B`
- Leicht verspielte Komponenten mit sanften Animationen
- Widgets wie: MiMiMiCard, FilterChips, Tränenbalken

---

## 🧪 Testing

- Unit Tests (z. B. für Formular-Logik)
- Widget Tests (UI-Komponenten)
- Integrationstests mit Mock-API

---

## 📬 Feedback & Mitwirken

Ideen, Bugs oder Feature-Requests? Öffne ein Issue oder sende eine Mail an `tbd`

---

## 📄 Lizenz

Open Source – Lizenz wird noch definiert (MIT oder Humorware)
