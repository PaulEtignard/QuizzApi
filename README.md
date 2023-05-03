# ApiQUIZZ

**Lien GitHub vers le front du projet** : https://github.com/PaulEtignard/QuizzApiFront

## Présentation du projet

**Objectif**
 
Le projet QUIZ consiste à créer une application WEB permettant à un utilisateur de répondre à des quiz thématiques.

**Notion de quiz**

Un quiz consiste à répondre à des questions à choix unique. A chaque question, l’utilisateur se voit proposer plusieurs réponses (4 à chaque fois) et devra sélectionner une seule réponse. Parmi les 4 réponses proposées, une seule sera correcte. Si la réponse de l’utilisateur correspond à la réponse correcte, alors son score sera augmenté de 1. Lorsque l’utilisateur aura complété la totalité du quiz, un récapitulatif lui sera proposé. Le détail de ce récapitulatif sera détaillé ultérieurement.

**Spécifications fonctionnelles**

L’objectif est d’avoir un ensemble prédéfini de questions. Chaque question est caractérisée par un intitulé (la question elle-même) et est associée à un thème. Pour chaque question, il y a 4 réponses possible, une seule représentant la réponse correcte. Une réponse est caractérisée par un intitulé (la réponse elle-même). 
Un thème est caractérisé par un libellé. Par exemple, on peut avoir le thème musique, le thème sport, le thème informatique, etc. 
Lorsque l’utilisateur souhaite démarrer un quizz, il devra, dans un premier temps, sélectionner un thème parmi les thèmes disponibles et un nombre de questions auxquelles il souhaite répondre. A l’issue de cette sélection, un ensemble de questions, sélectionnées aléatoirement et liées au thème choisit, sera proposé à l’utilisateur. Celui-ci devra donc répondre à chacune d’elle en proposant obligatoirement une réponse. Si aucune réponse n’est proposée, il ne pourra pas passer à la question suivante.
 A la fin du quizz, l’utilisateur se verra proposé un récapitulatif. Ce récapitulatif devra afficher le score de l’utilisateur et un corrigé du quiz. Le corrigé devra, pour chaque question, afficher la réponse de l’utilisateur ainsi que la réponse correcte. Ainsi, l’utilisateur pourra visualiser ses éventuelles erreurs.
## Présentation des différents outils utilisé

 - *Langage de programmation :* HTML, CSS, JS, PHP
 - *Framework :* Symfony 6
 - *Gestionnaire de version* : Git / GitHub
 - *SGBD :* MySQL sous XAMPP
 - *Documentations :*
	 - https://symfony.com/doc/current/index.html
	 - https://www.php.net/manual/fr/index.php
	 - https://developer.mozilla.org/fr/docs/Web/JavaScript

## Présentation des EndPoints
- **/api/themes** : Récupère tout les themes disponible dans la base de donnée
- **/api/{theme}/{nombre de questions}** : Récupère *{nombre de question}* du theme *{theme}* de façon aléatoire
