# Natural Dentistry — WordPress Theme

**Version:** 1.0.0  
**Author:** Natural Dentistry / Dr. Yuriy May DMD  
**Requires WordPress:** 6.0+  
**Requires PHP:** 8.0+  
**License:** GPL-2.0-or-later

---

## Overview

A premium, minimalist WordPress theme built for high-end biological dental practices. Designed around the visual identity of Natural Dentistry — specializing in Biological Dentistry & Ceramic Implants.

---

## Design System

| Token | Value |
|---|---|
| Display Font | Cormorant Garamond (serif) |
| Body Font | DM Sans (sans-serif) |
| Primary | #0a0a0a (Black) |
| Accent | #c9a96e (Warm Gold) |
| Background | #ffffff / #f5f4f1 |
| Layout | Bootstrap 5 + Custom CSS Grid |

---

## File Structure

```
natural-dentistry/
├── style.css                    ← Theme stylesheet + metadata
├── functions.php                ← Setup, enqueues, CPTs, schema, customizer
├── header.php                   ← Sticky header, nav, mobile drawer
├── footer.php                   ← Footer, sitemap links, social, map
├── front-page.php               ← Home page (assembles all sections)
├── index.php                    ← Blog / archive fallback
├── page.php                     ← Default page template
├── assets/
│   ├── css/                     ← (Additional CSS if needed)
│   ├── js/
│   │   └── main.js              ← Header scroll, carousel, lightbox, reveals
│   └── images/
│       └── hero-bg.jpg          ← ← REPLACE with actual hero image
└── template-parts/
    ├── section-hero.php         ← Section 1: Hero banner
    ├── section-about.php        ← Section 2: Stats bar + About Dr. May
    ├── section-services.php     ← Section 3: Services grid + Philosophy
    ├── section-gallery.php      ← Section 4: Before/After + Testimonials
    ├── section-procedures.php   ← Section 5: Travel + Publications + Root Canal + Procedures + References
    └── section-contact.php      ← Section 6: Contact form + Schedule
```

---

## Installation

1. Upload the `natural-dentistry` folder to `/wp-content/themes/`
2. Activate the theme in **Appearance → Themes**
3. Set a static front page in **Settings → Reading**
4. Assign menus in **Appearance → Menus** (register `primary` and `footer` locations)
5. Configure practice info in **Appearance → Customize → Practice Information**

---

## Required Plugins

| Plugin | Purpose |
|---|---|
| **Contact Form 7** | Contact / consultation form |
| **Bookly** or **Amelia** | Online appointment booking |
| **Yoast SEO** or **RankMath** | Extended SEO metadata |
| **WP Smush** | Image optimization |
| **Wordfence** | Security |

---

## Customizer Settings

Navigate to **Appearance → Customize → Practice Information** to configure:

- **Contact Details** — phone, email, address
- **Social Media** — Instagram, Facebook, YouTube URLs
- **Google Maps** — API key, clinic latitude/longitude
- **Hero Section** — headline, subheadline, body text, background image
- **SEO & Sharing** — Open Graph image URL

---

## Custom Post Types

| CPT Slug | Admin Label | Purpose |
|---|---|---|
| `nd_testimonial` | Testimonials | Patient quotes with star rating & location meta |
| `nd_case` | Before & After | Clinical cases with before/after image meta |
| `nd_publication` | Publications | Research papers with journal, authors, URL meta |
| `nd_team` | Team Members | Staff profiles |

---

## Schema Markup

The theme automatically outputs `Dentist` schema (JSON-LD) on the front page, populated from Customizer settings. Update the Customizer fields for full schema accuracy.

---

## Hero Background Image

Replace `assets/images/hero-bg.jpg` with a high-resolution (1920×1080+) image of the clinic or a patient smile. Set via **Customize → Hero Section → Hero Background Image URL** for a dynamic solution.

---

## Compatible Booking Plugins

The theme's `#contact` section reserves space for a booking plugin embed. To integrate:

1. Install **Bookly** or **Amelia**
2. Add their shortcode inside the contact section or create a dedicated `/appointment` page using the `page.php` template
3. Set the "Schedule Appointment" CTA links to `#contact` or `/appointment`

---

## Google Maps Integration

1. Obtain a Google Maps Embed API key from Google Cloud Console
2. Enter it in **Customize → Practice Information → Google Maps → Google Maps API Key**
3. Set latitude/longitude for your clinic location
4. The map will render with a grayscale filter matching the theme aesthetic

---

## Changelog

### 1.0.0
- Initial release
- Mobile-first, Bootstrap 5 architecture
- 9 major page sections
- Custom post types: Testimonials, Cases, Publications, Team
- Lightbox gallery, testimonials carousel
- Schema markup for Dentist
- Customizer integration
- Compatible with CF7, Bookly, Amelia, Yoast SEO

---

*Built for Natural Dentistry. All rights reserved.*
