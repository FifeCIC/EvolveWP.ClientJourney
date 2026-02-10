# WPClientJourney
A WordPress-centric CRM for managing client onboarding, subscription packages, and automated account provisioning.

Here is the complete README.md text for the wp-client-journey repository, tailored to the EvolveWP branding and the specific features needed for the Fife Driving Instructor Portal (and future CRM projects).

# EvolveWP Client Journey

🚀 **A WordPress-centric CRM for managing client onboarding, subscription packages, and automated account provisioning.**

Built by [FifeCIC](https://fifecic.scot) | Part of the [EvolveWP Ecosystem](https://evolvewp.dev)

---

## 📖 Overview

**EvolveWP Client Journey** streamlines the end-to-end client lifecycle directly within WordPress. Designed originally to power the *Fife Driving Instructors Portal*, it handles everything from the initial signup form and package selection to automated user role provisioning and ongoing account management.

It bridges the gap between a standard contact form and a full-blown SaaS platform, allowing you to treat WordPress users as "Clients" with specific lifecycles, statuses, and service tiers.

---

## ✨ Key Features

✅ **Automated Onboarding** - Create seamless multi-step signup flows that register users and gather data.  
✅ **Package Management** - Define subscription tiers (e.g., Free, Premium, Enterprise) and assign them to users.  
✅ **Role Provisioning** - Automatically switch user roles based on package selection or verification status.  
✅ **Client Portal** - Provide a dedicated dashboard area for clients to manage their profile and subscription.  
✅ **Verification Workflows** - Built-in tools for verifying client data (e.g., driving instructor license checks).  
✅ **EvolveWP Integration** - Designed to work seamlessly with *OpsStudio* and *PredictiveERP*.

---

## 🚀 Getting Started

### Prerequisites

- WordPress 6.0+
- PHP 7.4+
- [EvolveWP Core](https://github.com/FifeCIC/evolvewp-core) (Recommended)

### Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/FifeCIC/wp-client-journey.git
Install Dependencies

bash
composer install
npm install
Build Assets

bash
npm run build
Activate

Upload to your /wp-content/plugins/ directory.
Activate EvolveWP Client Journey via the WordPress Admin.
🛠️ Configuration
Define Packages: Navigate to Client Journey > Packages to set up your service tiers.
Setup Onboarding: Create a new Onboarding Flow and map fields to User Meta.
Shortcodes: Use [evolvewp_client_onboarding] to display the signup form on any page.
📁 Project Structure

wp-client-journey/
├── evolvewp-client-journey.php  # Main plugin file
├── includes/
│   ├── Admin/                   # Admin UI & Settings
│   ├── Frontend/                # Client-facing forms & dashboard
│   ├── Core/                    # Data models (Client, Package, Subscription)
│   └── Onboarding/              # State machine for signup flows
├── assets/                      # Compiled CSS/JS
├── templates/                   # Frontend view templates
└── tests/                       # PHPUnit tests
🛣️ Roadmap
[ ] v1.0 (MVP): Core onboarding, user registration, and basic package assignment.
[ ] v1.1: Stripe integration for paid packages.
[ ] v1.2: "Verification Crawler" for automated backlink checking (Fife Driving Portal).
[ ] v2.0: Visual Flow Builder for custom onboarding steps.
🤝 Contributing
We welcome contributions! Please see our Contribution Guidelines for details on coding standards and pull request processes.

Fork the repo
Create a feature branch (git checkout -b feature/amazing-feature)
Commit your changes
Push to the branch
Open a Pull Request
📜 License
This project is licensed under the GPLv2 or later - see the LICENSE file for details.

Built with ❤️ by FifeCIC
Empowering local businesses with professional WordPress tools.
