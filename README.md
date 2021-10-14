# ift-api-bundle-boutique
API bundle for Boutique functionality

- requires api bundle
- requires easyadmin bundle


GENERAL NOTES FOR MAKING STARBOARD BUNDLES (with API-Platform):
- Create a new empty API-Platform project (for running one bundle at a time)
- Create /lib/Inflyter folder for bundles
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

- add bundle lib/Inflyter/Bundle/Entity|Model folder to api_platform.yaml mapping->paths
paths: ['%kernel.project_dir%/src/Entity', '%kernel.project_dir%/lib/Inflyter/BoutiqueBundle/src/Entity' , '%kernel.project_dir%/lib/Inflyter/BoutiqueBundle/src/Model']

- composer.json (main project)
"autoload": {
        "psr-4": {
            "Inflyter\\BoutiqueBundle\\": "lib/Inflyter/BoutiqueBundle/src/",
            "App\\": "src/"
        }
    },

- add Bundle file to bundle/src

- define service classes in Resources/config/services.xml
- load services with DependencyInjection/*Extension class
