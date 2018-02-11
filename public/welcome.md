# Un rapide guide pour rédiger un article

L'éditeur a automatiquement été mis en mode ***aperçu***, vous pous pouvez repasser en mode ***édition*** en cliquant sur l'icône en forme **d'oeil**.

Les articles sont rédigés au format **Markdown**. Il permet une conversion directe en HTML tout en étant plus abordable que celui-ci. Dans le cas du Fil, cela permet une consistence dans le style typographique des articles. 


Afin de faciliter l'apprentissage du Markdown, l'éditeur dispose d'une **barre d'outils** qui fonctionne comme un éditeur de texte normal.

---
# Titres

Pour créer un titre, il suffit d'insérer un signe **#** par niveau de titre.

```
# Titre de niveau 1
## Titre de niveau 2
### Titre de niveau 3
```

# Titre de niveau 1
## Titre de niveau 2
### Titre de niveau 3

---
# Styles de texte

## Italique

```
*ce texte est en italique*
```
*ce texte est en italique*.

## Gras

```
**ce texte est en gras**
```
**ce texte est en gras**.

## Gras italique

```
***ce texte est en gras et en italique***
```
***ce texte est en gras et en italique***.

---
# Listes

## Listes ordonnées

```
1. Premier élément.
2. Autre élément.
5. La valeur des chiffres n'a pas d'importance, c'est juste un nombre.
```
1. Premier élément.
2. Autre élément.
5. La valeur des chiffres n'a pas d'importance, c'est juste un nombre.

## Listes non ordonnées

```
* Premier élément.
* Autre élément.
```
* Premier élément.
* Autre élément.

## Sous-listes

1. Élément
 * Sous-élément
 * Autre sous-élément

---
# Insertions

## Liens

```
[Je suis un lien](https://www.google.com)
```
[Je suis un lien](https://example.com)

## Images

```
![Je suis une image](https://www.w3schools.com/howto/img_fjords.jpg)
```
![Je suis une image](https://www.w3schools.com/howto/img_fjords.jpg)

---
# Tableaux

```
| Les tableaux  | C'est            | Cool  |
| ------------- |:----------------:| -----:|
| 3e colonne est| alignée à droite | 1600€ |
| 2e colonne est| centrée          |   12€ |
| zebra stripes | are neat         |    1€ |
```
Les caractères `:` peuvent être utilisés pour aligner les colonnes.

| Les tableaux  | C'est            | Cool  |
| ------------- |:----------------:| -----:|
| 3e colonne est| alignée à droite | 1600€ |
| 2e colonne est| centrée          |   12€ |
| zebra stripes | are neat         |    1€ |

Vous devez utiliser au moins 3 tirets pour séparer chaque entête de tableau. Les séparateurs verticaux `|` extérieurs sont facultatifs et il n'est pas nécessaire d'aligner harmonieusement le texte brut en Markdown. Vous pouvez utiliser des syntaxes Markdown en ligne dans les cellules de tableau.

```
Markdown | Moins | Joli
--- | --- | ---
*Toujours* | `affiché` | **correctement**
1 | 2 | 3
```
Markdown | Moins | Joli
--- | --- | ---
*Toujours* | `affiché` | **correctement**
1 | 2 | 3

---
# Citations

```
> Les citations sont très pratiques dans les mails pour indiquer le texte auquel on répond.
```
> Les citations sont très pratiques dans les mails pour indiquer le texte auquel on répond.

---
# Séparateur horizontal

```
Insérez trois occurrences ou plus de ces caractères :
---
```
Insérez trois occurrences ou plus de ces caractères :

---
