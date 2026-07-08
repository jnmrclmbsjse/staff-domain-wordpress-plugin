# Staff Domain - Technical Assessment
## Task A - WordPress Custom Plugin

### Task details
Build a small custom WordPress plugin (no page builders or off-the-shelf plugins doing the
work for you) that:
1. Adds a settings page in the WordPress admin where an administrator can enter and save
   a configuration value (e.g., a city name or an API key).
2. Fetches data from a public API of your choice (e.g., weather, currency, or quotes API)
   using that setting.
3. Exposes the fetched result on the front end.

> Note from Junmar: This task I built by hand (traditional development and not AI-assisted)

### How to run to project and review it
#### Requirements
- Docker
- Docker Compose

#### Steps
1. Clone the repository
2. Copy `.env.example` to `.env` and update the values
3. Run `docker-compose up`
4. Once the container is up, on your host machine run `docker compose exec wordpress composer install --working-dir=/var/www/html/wp-content/plugins/staff-domain-wordpress-plugin`
5. or exec (`docker compose exec -ti wordpress bash`) into the container, run `cd wp-content/plugins/staff-domain-wordpress-plugin` then run `composer install`
6. Visit `http://localhost:{PORT_IN_ENV}` in your browser
7. Configure the WordPress site.
8. Go to Plugins > Installed Plugins > Staff Domain - WordPress Custom Plugin and click Activate.
> Todo: Next steps once the core is ready