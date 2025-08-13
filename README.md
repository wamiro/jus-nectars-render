
# Jus & Nectars – Laravel e-commerce (Render-ready)

Dépôt prêt pour **Render**. Cette image Docker **télécharge Laravel** lors du build, puis applique un **overlay** avec le code du site (modèles, contrôleurs, vues, routes, migrations). Aucun besoin de Laragon.

## Déploiement sur Render
1. Crée un dépôt GitHub et pousse ce code.
2. Sur Render → *New +* → *Web Service* → *Build with Docker* → connecte ton dépôt.
3. Variables d'environnement à définir (onglet *Environment* de Render) :
   - `APP_KEY` : laisse vide au premier déploiement, puis exécute la commande ci-dessous pour le générer (ou mets une clé générée localement).
   - `APP_NAME=JusNectars`
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL` : l'URL publique Render (après 1er déploiement, re-définis-la)
   - `DB_CONNECTION=pgsql`
   - `DB_HOST=postgres` (ou l'host fourni par Render si DB managée)
   - `DB_PORT=5432`
   - `DB_DATABASE=render`
   - `DB_USERNAME=render`
   - `DB_PASSWORD=ton_mot_de_passe`
   - `SESSION_DRIVER=database`
   - `LOG_CHANNEL=stderr`
   - `LOG_LEVEL=info`

4. **Commande post-déploiement** (shell Render → *Shell* ou via *Jobs*):
   ```bash
   php artisan key:generate --force
   php artisan migrate --force
   php artisan db:seed --force
   ```

> Astuce : Ajoute un service PostgreSQL managé dans Render, copie les credentials dans les variables d'environnement du service web.

## Fonctionnalités incluses
- Accueil (produits phares, valeurs, engagements, actus)
- Catalogue avec filtres par type/gamme/occasion/contenance (GET params + léger JS)
- Fiche produit (photo, description, origines, fabrication, prix, disponibilité)
- Panier (sessions) + commande (simulation) avec frais de livraison et total TTC
- Pages : Histoire, Fabrication (extraction à froid, HPP), Engagements, FAQ
- Contact (formulaire + carte embarquée)
- Admin simple via commandes artisan (seed + CRUDs basiques via tinker).

## Développement local sans Laragon (optionnel)
- Installer Docker Desktop
- `docker build -t jus-nectars .`
- `docker run -p 8080:80 --env-file .env.example jus-nectars`
- Ouvre http://localhost:8080

## Structure
- `Dockerfile` : construit Laravel et applique l'overlay
- `overlay/` : code de l'application (à fusionner dans Laravel)
