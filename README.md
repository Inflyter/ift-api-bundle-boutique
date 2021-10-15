# ift-api-bundle-boutique
API bundle for Boutique functionality

- requires api bundle
- requires easyadmin bundle

INSTALLATION
- and the bundle to composer.json in main project
"repositories": [
        {"type": "vcs", "url": "https://github.com/Inflyter/ift-api-bundle-boutique.git"}
    ]
- composer update
- composer require inflyter/api-boutique "dev-main"

GENERAL NOTES FOR MAKING BUNDLES (with API-Platform):
- Create a new empty API-Platform project (for running one bundle at a time)
- Copy the required entities/ service classes to the API-Platform bundle project (repository classes need fiddling to work with API)

- Clean up the entities:
    - remove unneeded fields
    - remove JMS annotations
    - add API annotations
    - add property types
    - restrict to GET/POST/PUT/DELETE as required

- Resolve target entities where there are relationships with entities in the rest of the system
    - https://symfony.com/doc/current/doctrine/resolve_target_entity.html
    - Create a Model/*/Interface
        - mostly just with ID property unless others are required for bundle
    - Use the Interface for the property type and initialize property with null
    - Create a dummy entity which implements the interface
        - make sure it has the inverseRelationships methods if required
        -> TODO: THIS NEEDS TO BE REPLACED BY THE REAL ENTITY FROM THE OTHER BUNDLES DURING COMPOSER INSTALL/ DEPLOYMENT
    - This should make the bundle usable without the rest of the system!


BUNDLE NOTES:
https://symfonycasts.com/screencast/symfony-bundle/bundle-directory
- create git project
- main directory is equivalent to app/src
- same folders as normal src directory, plus DependencyInjection and Resources folders
- add Bundle class file in main directory (name is important)
- define service classes in Resources/config/services.xml
- load services with DependencyInjection/*Extension class (name is important)
- create a composer.json file in the main directory (name and namespace are important)
- create a github auth token to access to repo
		https://github.com/settings/tokens




check in main project:
- config/bundles.php has been updated with bundle
- if API-Platform doesn't find the entities, add the path in config/packages/api-platform.yaml (mapping -> paths)
