<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Category;
use App\User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = Article::create([
            'user_id'       => User::where('username', 'jpointel')->first()->id,
            'title'         => 'Il accroche une corde au bus de l\'UTCéenne et monte sur un skate. Le résultat est tragicomix',
            'body'          => '
                Ce Samedi 30 septembre, devant Benjamin Franklin, un corps sans vie est retrouvé à l\'angle de la rue Roger Couteau-Lent. D\'abord pris pour une énième flaque de vomi par les passants, c\'est Claudette, 86 ans, qui contacte les secours à 14h du matin. Reportage.

                Dépêché dans l\'après-midi sur les lieux du carnage, nos équipes réussissent à réunir les témoignages et reconstituer l\'histoire. Ce jour-là, lors de la célèbre soirée privatisée au Parc Astérix, un jeune homme s\'avance devant le départ des navettes, crâne rasé, tatouage dragon, l\'air fier, la tête haute et les cheveux au vent. Il porte un skate et une corde, qu\'il attache soigneusement à l\'arrière du bus, celui de 16h30, avant que ce dernier ne s\'élance.
                "On a tout de suite senti qu\'il y avait un problème", déclare un certain George Profond. "Il ne tenait sa corde que d\'une main, cette dernière enroulée dedans, tandis que l\'autre main tenait sa caméra, sûrement pour montrer à ses amis son exploit."

                L\'expertise balistique est on ne peut plus claire : au rond-point suivant, tout s\'accélère : sous la pression des voyageurs, le conducteur commence à enchaîner les tours de rond-point, tandis que le dénommé Alain Parfait se retrouve la main coincée dans la corde. Après 4 tours, le poignet aurait lâché.

                Un de ses amis nous explique par la suite : "Ouai c\'est la force d\'hémorroïde ou un truc comme ça, on l\'a vu en cours je crois. Mais Alain, lui, en amphi, était trop occupé à confectionner un plan pour attraper une des premières navettes de vendredi après son échec au shotgun."

                Pour éviter de futurs accidents, les étudiants sont donc invités à appuyer sur "OK" pour valider leur choix lors des prochains shotguns.',
            'category_id'   => Category::where('name', 'Le Gorafil')->first()->id,
            'slug'          => 'corde-bus-utceene-skate-tragicomix',
        ]);
        $article = Article::create([
            'user_id'       => User::where('username', 'sofil')->first()->id,
            'title'         => 'Cuisine de couple',
            'body'          => '
                La table était mise. Une table pour trois. Dans la cuisine, le four préchauffait depuis quelques minutes déjà.
                Il caressa puis éplucha délicatement un kiwi avant de le détailler en brunoise. Puis Il pressa les deux citrons et versa le jus dans sa salade de fruits. Il finit par attendrir la viande pour le dîner. Elle put alors mettre à cuire le lapin. Elle rangea la poudre de gingembre et la tablette de chocolat qui trainaient sur le plan de travail. Songeuse, Elle laissa fondre un carré qu’Elle venait d’y prendre. Il rangea le plan de travail d’un revers de main.  
                Il décida de pétrir la pâte avec douceur mais fermeté. Il la goutait de temps à autre pour en vérifier la saveur. Il salait et poivrait à sa convenance et des gouttes commençaient à perler sur son front.
                Dans son excès culinaire, Elle dégorgea le poireau. Il tapa l’aubergine avant de l’émincer. En cette soirée spéciale et pleine de promesses, Il lamina également l’écrevisse et mit le champagne au frais. Par la suite, Elle décida de se référer au site « Cook Hub » spécialisé dans les apéritifs dinatoires. Il picora le bonbon qui trainait par-là puis se laissa tenter par une sucette à l’anis. Il aimait les friandises. Assoiffé par cet excès de sucre, Il but à la fontaine de la cuisine où coulait une eau fraîche, pure et bienvenue.
                Au même instant, Elle faisait monter la mayonnaise tout en astiquant l’argenterie, puis monta les blancs en neige. La farce était prête à l’usage. Elle songeât qu’un poulet basquaise aurait été de circonstance.
                La cocotte-minute chanta.
                Elle reposa sa cuillère. Elle venait de terminer la préparation du banana-split. Il était saupoudré de baisers et fait avec amour.
                Le minuteur retentit sur les douze coups de minuit. Iel venait d’arriver.',
            'category_id'   => Category::where('name', 'Bobine X')->first()->id,
            'slug'          => 'cuisine-couple',
        ]);
        $article = Article::create([
            'user_id'       => User::where('username', 'sofil')->first()->id,
            'title'         => 'Les étudiants et la malbouffe, le reportage choc',
            'body'          => '
                Je vous ai suivis. Un par un. Comme une agente du Killer, je me suis glissée dans votre intimité jusque dans votre cuisine pour comprendre ce comportement abject et malsain que vous entretenez tous et toutes.
                Je vous ai vu faire la queue pour des muffins aux pépites de chocolat ou pour des chocolatines (#f***lesrageux).
                Je vous ai observé quand vous buviez ces canettes de sucre concentré et sucrées.
                J’ai vidé vos poubelles et ai découvert ces boites de pizzas encore chaudes et recouvertes de taches graisseuses.
                Je vous ai entendu parler de « vous faire un fast-food à Venette ».
                Je vous ai vu sortir ce biscuit pendant un amphi.
                Pauvres fous. Heureusement que Cac-carotte m’a redonné le moral en milieu de semaine, sinon je crois bien que cette page serait restée vierge.
                Mais enfin ! Etudiant rime avec manger équilibré ! Bon ok ça ne fonctionne pas…
                Nous savons que vous n’avez pas le temps. Nous savons que manger déstresse. Nous savons que le chocolat, c’est quand même VACHEMENT bon ! Et la bouffe grasse aussi. Mais pensez à vos corps sur la neige cet hiver… Bon décidément je dois avoir perdu la main !
                 
                Pensez à vos vacances de Noël (oui c’est un peu tôt) et aux repas de famille qui vont en découler. Vous ne pensez pas qu’il serait judicieux de préparer votre estomac à ce choc ? Bon alors suivez mes conseils. Mangez gras, mangez trop, mangez sucré, mangez salé, surtout grignotez et tout se passera bien !
                 
                RENDEZ-MOI MON SCRIPT ! Alors non, mangez normalement, à horaire fixe, ni trop ni pas assez. Allez renflouer les caisses de Cac-carotte et bouffez de la verdure (j’ai bien dit bouffez). Et sortez faire du sport. Oui on a du boulot, oui il fait froid dehors. Mais raison de plus pour faire du sport : ça réchauffe !',
            'category_id'   => Category::where('name', 'Scientifil')->first()->id,
            'slug'          => 'etudiants-malbouffe-reportage',
        ]);
        $article = Article::create([
            'user_id'       => User::where('username', 'Valentin')->first()->id,
            'title'         => 'La terre, les patates et les vieux',
            'body'          => '
                Un kilo de patates pour à peu près un euro, pareil pour des carottes pleines de terre, soixante centimes pour deux grosses poignées de champignons. C’est ça le marché ! À la fraîche, un sac à la main le samedi matin.

                Quel bonheur de savoir qu’on a acheté des bonnes choses à des gens pour qui ça a du sens, et pas de la merde industrielle ! Fuir le supermarché et ses caissiers payer au smic pour aller voir le fermier vendre ses oeufs et ses poulets ou goûter le miel de l’apicultrice. On peut leur poser des questions à tous ces marchands et marchandes : d’où ça vient ? comment s’est fait ? Et ils répondent, toujours contents : c’est moi qui les récoltes, je travaillais avec mon père avant qu’il ne soit trop vieux.

                En plus d’être un lieu convivial, les prix y sont largement abordables. En tout cas pour les fruits, les légumes et les œufs. La viande est plus chère mais tellement meilleure. C’est pareil pour le fromage ou le miel. Mais bon, mieux vaut manger une belle bavette toutes les deux semaines avec un bon bout de Manicamp plutôt qu’une escalope dans une barquette sous-vide avec du camembert Président.

                « Ubériser » le marché avec une quelconque application, comme certains veulent le faire, tuerait tout ça. Il n’y aurait plus de place pour la flânerie entre les étales, pour l’étonnement devant une courge cabossée ou encore pour se laisser tenter par le pain à l’épeautre de la boulangère. On serait comme des cons qui courent après le temps, ayant programmer l’heure exacte pour venir chercher un panier préparé quasi à la chaîne. Le tout avant de retourner bosser, l’ordi sous le bras comme de braves jeunes cadres dynamiques.

                On y voit plein de vieux au marché. D’ailleurs y a quasiment que ça. Aussi bien qu’on se demande ce que ça va devenir tout ça quand ils crèveront. On verra bien.

                Aller au marché c’est aussi retrouver le contact avec des choses simples et basiques : l’alternance des légumes s’accordant avec celle des saisons. C’est réapprendre certaines limites et faire avec celles-ci. Les étapes de transformation, l’emballage, les usines allant avec s’évaporent pour laisser place à un échange quasiment de la main à la main. Et on renoue avec quelque chose qui se perd peu à peu. Un peu comme tous ces vieux.',
            'category_id'   => Category::where('name', 'Au Fil de la Pensée')->first()->id,
            'slug'          => 'terre-patates-vieux',
        ]);
        $article = Article::create([
            'user_id'       => User::where('username', 'danousna')->first()->id,
            'title'         => 'Le Guide du Vieux Croûtard',
            'body'          => 'Dans l’archipel de vacuité qu’est le monde, il me faut parler de l’Islande, car justement c’est actuellement ma prison, mon île Sainte-Hélène à moi, le Napoléon déchu. Tout d’abord il est de mise de présenter ce pays dans ses caractéristiques physiques avant de s’attaquer à sa partie psychologique, sa culture, si l’on admet qu’il y en ait une. 
                L’Islande est un pays au climat ingrat qui oscille entre les nuages gris et les nuages blancs. La pluie et le vent sont comme le soleil chez nous, ils se lèvent au matin et se couchent le soir, mais je rappelle que l’Islande ne connaît que la nuit ou que le jour, si bien qu’il n’existe ni soir ni matin et donc la pluie et le vent sont toujours là. 
                J’aimerais tout d’abord être clair sur ce que j’entends par « chez nous ». Je parle de notre chère France, Étoile de la mer qui se situe au centre du monde (regarder les cartes) et dont le peuple, la culture et la compétitivité sont des exemples au travers du monde. Grand bien leur fasse à toutes ces anciennes colonies françaises qui ont su prendre leur indépendance, mais elles garderont à jamais la petite graine de folie française qui a permis au peuple français de dépasser sa condition de simple population sociale pour devenir une population cosmique ! Je ne veux pas parler de peuple élu mais la France est à mon sens un des phares de l’humanité au niveau de la culture disco-zouk et de la gestion des entrepôts. Mais reconcentrons nous sur l’Islande.
                L’Islande est un pays sans visage, sans identité, en effet l’influence nord-américaine est énorme. Les autoroutes qui structurent les alentours de Reykjavik sont remplies de grosses voitures style pick-up et autres 4x4 conduits par des islandais obèses. Je présente là, c’est vrai, des traits plutôt négatifs de l’Islande, mais tout n’est pas à jeter, j’ai croisé plusieurs fois des islandais très courtois qui conduisaient des renaults. 
                Comme je disais leur obésité est principalement due au fait que leur culture culinaire est principalement à base d’eau de javel. On trouve bien sûr les fameux « hot-dogs islandais » à base de hot-dog, d’oignons frits et d’oignons cuits. Ce qui finalement permet de saisir tout simplement à quoi se résume la culture islandaise, un mélange de la culture d’Amérique du Nord et d’oignons. 
                Mais certains me diront qu’il existe des spécialités culinaires purement islandaises, et donc pour remplir de complaisances, ces flagorneurs de la citoyenneté mondiale, j’évoquerai le hakarl. C’est un requin islandais qui ne peut se consommer qu’uniquement après avoir été conservé 6 mois dans la terre, car cet animal a la particularité de ne pas posséder de système urinaire, il transpire donc son urine. Il en résulte que son corps est rempli de celle-ci, il faut donc attendre 6 mois pour pouvoir le consommer. Malgré que la chair perde son caractère toxique, elle garde l’odeur de l’urine. On ne s’étonnera pas alors que l’Islande connaisse des problèmes de consanguinité et de bonheur au travail.
                Ce qui m’exaspère en vérité dans ce que j’ai pu voir en Islande, c’est l’absence totale de considération pour d’autres cultures à part celle nord-américaine. Il n’y a aucune considération pour l’identité européenne, c’est à cause de pays comme cela, des pays étouffés d’orgueil, que l’Europe est un échec tant sur le plan économique que culturel. La France, l’Allemagne et la Lettonie font des efforts énormes pour donner à notre continent un minimum de dignité et c’est tout simplement désolant de constater une telle médiocrité de la part de certains pays. Si vous voulez pousser la réflexion je vous invite à vous procurer le magnifique livre d’Emmanuel N.,  Comment trouver un bœuf bourguignon dans un pays composé à 90 % analphabètes ? qui explore la question de l’identité culinaire au travers du PIB européen.
                Nous conclurons sur cette métaphore certes osée mais qui nous semble juste. L’Islande est à l’image de son fameux hakarl, elle se complaît dans son urine.',
            'category_id'   => Category::where('name', 'Random')->first()->id,
            'slug'          => 'guide-vieux-croutard-islande',
        ]);
        $article = Article::create([
            'user_id'       => User::where('username', 'danousna')->first()->id,
            'title'         => 'Bonjour, je m\'appelle 保尔, Bao Er',
            'body'          => '
                Bonjour, je m\'appelle 保尔, Bao Er. Du moins c’est le nom que l’entreprise de mon père m’a donné lorsqu’il a fallu faire mon visa pour la Chine. Ils ont juste traduit phonétiquement mon nom en caractères chinois. Ça ne veut pas dire grand chose, mais pendant 18 ans on m’a appelé ainsi, du coup c’est devenu mon nom. (extrait du 1er épisode, Fil P15)

                Un repas chinois est très convivial. L’espace personnel de chaque convive se cantonne à un bol de riz -c’est le strict minimum, une petite assiette pour poser les déchets -bien que parfois on pose directement os et arêtes directement sur la nappe en plastique, un verre et une paire de baguettes. Ensuite la table, quelle que soit sa taille, est toujours pleine à craquer : assiettes, saladiers, casseroles et woks s\'entrechoquent et s’empilent tant bien que mal pour proposer la plus grandes diversité de plats. Les coudes se frottant à chaque passage, chacun se sert d’un morceau de poulet au miel, de quelques haricots frit pimentés, d’un morceau de canard sauce rouge, de porc caramélisé, de tofu...qu’il dépose dans son bol de riz avant de porter à sa bouche. Vers la fin du repas, on se verse un peu de soupe dans ce même bol, ce qui en passant permet de finir les derniers grains de riz. 

                Cette diversité de viande et de plats peut paraître surprenante, mais elle nécessaire en Chine pour un repas bien équilibré. Il y a généralement autant de plats que de personnes autour de la table. On peut donc facilement se retrouver à dix plats sur une plaque tournante avec du poulet en brochette, des crevettes frites, de la langue de boeuf, du tofu pimenté, des aubergines à la vapeur, des champignons avec algues, de l’émincé de mouton avec poivrons, des vermicelles, une carpe en soupe et des cacahuète grillées. Souvent lors de la prise de commande, le serveur ou la serveuse conseille de rééquilibrer un peu la donne et de rajouter un plat de légumes à la place d’une viande ou vice versa. 

                Mais cela ne concerne pas tous les restaurants chinois, une majorité certe, mais il en existe bien d’autre. 

                Il y a par exemple les restaurants de nouilles qui viennent du Ouïghour. C’est une région à l’ouest de la Chine où la population est musulmane, ainsi ils mangent beaucoup de mouton. Quand ils viennent s’établir dans les grandes villes de l’est, ils ouvrent souvent des petits restaurants de pâtes. Mais pas n’importe quelles pâtes! : Dès 拉面 La Mian (pâtes tirées). A l’entrée de chaque échoppe, se trouve un grand comptoir en métal où travaille le chef. Lorsqu’un bol de nouille est commandé, il soulève un linge qui couvre une énorme boule de pâtes dans un coin du comptoir et en arrache un bon morceau. Il commence par la rouler en longueur, puis la saisissant par chaque bout il la tire en l’air tout en la faisant onduler et en le claquant sur le comptoir. Il rejoint les deux bouts et attrape le centre avec une main et retire en ondulant et frappant. Il a ainsi une longue “corde” de pâtes plié en deux entre ses mains. Il continue donc à tirer et plier tirer et plier, jusqu’à que, rapidement, il se retrouve avec une cinquantaine de longues pâtes entre ces deux mains, chacune fines de quelques 2-3 millimètres de diamètre. Il ne lui reste plus qu’à balancer ses pâtes dans la casseroles d’eau bouillante. 

                D’autres restaurants préfèrents se spécialiser dans les 饺子 JiaoZi (Ravioli Chinois), d’autres dans les dumplings, les 火锅 HuoGuo (Hot pot), etc...',
            'category_id'   => Category::where('name', 'Enfin un Chinois qui vous Parle')->first()->id,
            'slug'          => 'chinois-voyage',
        ]);
    }
}
