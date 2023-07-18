USE
    test_Webreathe;

    -- Insertion de données dans les colonnes de la table modules
    -- Les colonnes ID et date (modules) sont automatiquement remplies lors de la création d'une colonne

INSERT INTO modules(
    TYPE,
    capacite_max,
    description
)
VALUES(
    'motion sensor',
    100,
    'Capteur de mouvement pour surveiller les entrées'
),(
    'camera',
    50,
    'Caméra IA de comptage et de surveillance'
);

-- Insertion de données dans les colonnes de la table historique_fonctionnement

INSERT INTO historique_fonctionnement(
    module_id,
    date_heure,
    etat,
    taux_remplissage
)
VALUES(
    1,
    '2023-07-18 09:00:00',
    'en_ligne',
    0.0
),(
    1,
    '2023-07-18 12:30:00',
    'en_ligne',
    0.1
),(
    1,
    '2023-07-18 15:45:00',
    'hors_ligne',
    NULL
),(
    2,
    '2023-07-18 09:30:00',
    'en_ligne',
    0.0
),(
    2,
    '2023-07-18 14:00:00',
    'en_ligne',
    0.5
),(
    2,
    '2023-07-18 18:15:00',
    'hors_ligne',
    NULL
);

