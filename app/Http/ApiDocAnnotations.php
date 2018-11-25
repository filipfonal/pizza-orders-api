<?php

/**
 * @OA\Info(
 *      version="0.0.1",
 *      title="Pizza Orders",
 *      description="Pizza orders api documentation",
 * )
 */

/**
 * @OA\Post(
 *      path="/auth/register",
 *      tags={"Auth"},
 *      summary="Registering new user",
 *      description="Registering new user",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "secret",
 *                   "password_confirmation": "secret"
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully registered",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/facebook",
 *      tags={"Auth"},
 *      summary="Facebook login",
 *      description="Returns app access_token by FB access_token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "access_token": "VALID_FB_ACCESS_TOKEN",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully authenticated through Facebook",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/login",
 *      tags={"Auth"},
 *      summary="App login",
 *      description="Returns login access token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "secret",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully authenticated",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Get(
 *      path="/admin/users",
 *      tags={"Admin"},
 *      summary="Users table",
 *      description="Returns admin table of users",
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="Jan"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "data":{{"id":1,"name":"Jan Kowalski","email":"example@example.com","provider":"app"}},"meta":{"columns":{{"name":"id","label":"id","sortable":true,"searchable":false},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"email","label":"email","sortable":true,"searchable":true},{"name":"provider","label":"provider","sortable":true,"searchable":true}},"paginator":{"current_page":1,"last_page":1}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Get(
 *      path="/admin/restaurants",
 *      tags={"Admin"},
 *      summary="Restaurants table",
 *      description="Returns admin table of restaurants",
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="Legnica"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      {"data":{{"id":1,"name":"Sequi rem debitis odit.","city":"Lake Ebonymouth","address":"1592 Evie Roads","phone":"1-424-993-9569","photo":null,"description":"Ut qui incidunt accusamus omnis rem laboriosam eum asperiores molestiae possimus et omnis odio laborum molestiae cum corrupti.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":2,"name":"Enim quas.","city":"Denistown","address":"5644 Phoebe Dam","phone":"357.682.3339 x9996","photo":null,"description":"Et fugit aspernatur perspiciatis dignissimos dolores quos blanditiis et harum sint vel et ut iste iure dolorem in dolores earum veniam eaque officiis deleniti rerum.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":3,"name":"Nemo voluptates et.","city":"West Hertha","address":"797 Elnora Pine","phone":"+1 (941) 270-6126","photo":null,"description":"Unde perspiciatis quo aut praesentium illum et maiores totam vel tempora ratione qui nam exercitationem totam occaecati assumenda.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":4,"name":"Culpa voluptatibus.","city":"North Reynaborough","address":"59198 Dalton Union","phone":"1-369-443-5828","photo":null,"description":"Voluptatem blanditiis qui dolorum voluptas nihil vel consectetur consequatur modi corporis aut est et iusto architecto labore omnis et cumque ipsum occaecati.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":5,"name":"Qui ab.","city":"Lake Simland","address":"79656 Lisette Walk Apt. 687","phone":"846-920-1733","photo":null,"description":"Consectetur quisquam vel atque quos reiciendis eveniet exercitationem nam a et architecto maiores.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":6,"name":"Perferendis quod hic.","city":"Deshawnport","address":"5625 Andreanne Valleys Apt. 630","phone":"801.381.9102 x37706","photo":null,"description":"In necessitatibus dolorem veritatis nemo molestias quidem ut et amet.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":7,"name":"Eveniet sed.","city":"Rosenbaumbury","address":"12923 Madilyn Union","phone":"928.277.7146","photo":null,"description":"Dolore expedita quisquam quis ratione consequatur magni dolore velit quae cumque unde architecto minus quas consequuntur rerum ea qui.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":8,"name":"Adipisci harum.","city":"Hillview","address":"255 Viva Union Apt. 103","phone":"+1-202-681-8419","photo":null,"description":"Libero nam quidem ipsam sed sed debitis sit hic qui velit minima.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":9,"name":"Optio error ullam.","city":"Port Novafurt","address":"8428 Upton Mills","phone":"305-573-3285","photo":null,"description":"Et iure sit sunt error aut neque et eius qui illo non aperiam quisquam perspiciatis ut ipsa ea voluptatem cumque ab id sint libero.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":10,"name":"Corrupti nihil.","city":"East Alvera","address":"5058 Bertrand Coves","phone":"939-570-4502","photo":null,"description":"Odio vel quisquam quos aut quo ad velit voluptas repellendus vel dolorem nulla quis cumque id sunt dolorum.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":11,"name":"Velit similique aperiam.","city":"West Emorytown","address":"8774 McClure Mountains Suite 059","phone":"325.564.5314 x11564","photo":null,"description":"Autem enim ut vel quos officia eum at et ex voluptates.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":12,"name":"Architecto in.","city":"South Jayceeborough","address":"653 Moore Grove Suite 486","phone":"856-989-7616 x8099","photo":null,"description":"Voluptas veniam fuga harum et quo ipsam eaque accusantium pariatur aliquid velit natus et incidunt quas quo sit ut.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":13,"name":"Temporibus consectetur.","city":"Feilview","address":"4460 Travon Islands","phone":"(319) 246-4367 x7853","photo":null,"description":"Ratione et aut doloremque porro nihil amet repudiandae ut numquam molestiae error iusto et.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":14,"name":"Eum ducimus.","city":"Huelfort","address":"319 Swift Stravenue","phone":"(516) 920-5530","photo":null,"description":"Qui voluptatem inventore a et accusamus optio eveniet vel.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":15,"name":"Molestias deserunt porro.","city":"Lake Jessie","address":"32592 Littel Grove Suite 789","phone":"240.729.2958 x90707","photo":null,"description":"Facilis dicta nulla placeat alias ad inventore ut amet occaecati.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":16,"name":"Laborum perferendis ullam.","city":"East Dockton","address":"16314 Alexandra Plain","phone":"(726) 416-3099","photo":null,"description":"Architecto quo reiciendis corrupti voluptatem temporibus reiciendis non et in voluptatem harum numquam a non voluptatem et unde aut error alias.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":17,"name":"Dolor delectus.","city":"Jacobsonmouth","address":"266 Rice Vista","phone":"973.849.8896","photo":null,"description":"Iusto omnis facilis quam quia rerum quis aut ducimus dolores voluptatibus iure.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":18,"name":"Magnam dignissimos.","city":"Lake Jocelynton","address":"567 Shawn Tunnel Suite 855","phone":"+19082404750","photo":null,"description":"At et at cumque velit vel maxime eos voluptatem ea facere earum sit in vero dolores.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":19,"name":"Architecto voluptatum cumque.","city":"Watersport","address":"4350 Kirlin Hill","phone":"934-842-9787","photo":null,"description":"Est et eos architecto fuga in doloremque quia.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":20,"name":"Illo magnam necessitatibus.","city":"Port Floridaberg","address":"34768 West Park Apt. 038","phone":"1-570-573-7173","photo":null,"description":"Voluptates et in officia at facere totam dignissimos impedit fugit quo.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":21,"name":"Qui et eos ut.","city":"Cliffordborough","address":"86139 Koepp Viaduct Apt. 212","phone":"1-971-968-3764 x1218","photo":null,"description":"In qui porro accusamus nostrum nisi modi quaerat dolores voluptatem sequi omnis enim aliquam quasi eaque asperiores qui.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":22,"name":"Qui suscipit.","city":"New Greyson","address":"80555 Mueller Valleys","phone":"+15264633611","photo":null,"description":"Ut perspiciatis consequatur velit dolorum accusamus voluptas non quis sit veniam cumque aut placeat vel non est architecto aut dolore qui qui.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":23,"name":"Earum amet sapiente consequatur.","city":"Kilbackstad","address":"75784 Larson Islands Apt. 575","phone":"1-581-328-0689 x1588","photo":null,"description":"Quam minima quaerat corporis quis sint excepturi illum quo voluptas animi corrupti ut sed aut cumque quaerat fugiat labore veritatis eum officia.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":24,"name":"Illum laborum.","city":"Trantowhaven","address":"3973 Jonas Plain Apt. 974","phone":"803.733.0457","photo":null,"description":"Non molestiae aut totam quo neque fuga harum velit omnis et.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}},{"id":25,"name":"Itaque non.","city":"North Annaliseview","address":"8672 Lang Dale Apt. 344","phone":"697-499-6841","photo":null,"description":"Veritatis officiis minima voluptatem sapiente qui repellat quos aliquam eaque dolor libero labore quaerat illum voluptate voluptatum velit iure totam.","created_at":"2018-11-25 15:21:10","owner":{"id":1,"name":"Jan Kowalski"}}},"meta":{"columns":{{"name":"id","label":"id","sortable":true,"searchable":false},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"city","label":"city","sortable":true,"searchable":true},{"name":"address","label":"address","sortable":true,"searchable":true},{"name":"phone","label":"phone","searchable":true},{"name":"description","label":"description","searchable":true},{"name":"created_at","label":"created_at","sortable":true},{"name":"owner","label":"owner"}},"paginator":{"current_page":1,"last_page":2}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/admin/ingredients",
 *      tags={"Admin"},
 *      summary="Ingredients table",
 *      description="Returns admin table of ingredients",
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="cheese"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     {"data":{{"id":1,"name":"sauce","image":null},{"id":2,"name":"cheese","image":null},{"id":3,"name":"mushrooms","image":null},{"id":4,"name":"salami","image":null},{"id":5,"name":"ham","image":null},{"id":6,"name":"chicken","image":null}},"meta":{"columns":{{"name":"id","label":"id","sortable":true},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"image","label":"image"}},"paginator":{"current_page":1,"last_page":1}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */