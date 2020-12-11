<?php

require 'connec.php';

function loadClass($class)
{
    require $class . '.php';
}

spl_autoload_register('loadClass');

$db = new PDO(DSN, USER, PASS);

$manager = new TechnologyManager($db);

$technologies = $manager->getTechnologies();
$images = $manager->getImages();
$technologiesInformation = $manager->technologiesInformation();
$phrases = $manager->getPhrases();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Technology</title>
<!--        <link rel="stylesheet" href="style.css" /> -->
    </head>

    <body>
        <h1 id="MAIN_title" class="MAIN_title">Technology of The Future</h1>

        <main id="page">
            <header id="navigation">
                <nav>
                    <ul>
<?php
    foreach ($technologies as $technology) {
        echo '<li class="aboutTechnology">' . $technology['name'] . '</li>';
    }
?>
                    </ul>
                </nav>
            </header>

            <div class="content" id="content">
            </div>
        </main>

        <div id="cssStyle"></div>

        <script>
            /*=========================================================================
            =========================== Global Function ===============================
            ==========================================================================*/

            function randNum(min, max, integer) {
                if (!integer) {
                    return Math.random() * (max - min) + min;
                } else {
                    return Math.floor(Math.random() * (max - min) + min);
                }
            }

            function selectImagesOfTechnology(technology, array) {
                let listImages = {};

                for (let i = 0, c = array.length; i < c; i++) {
                    if (array[i]['technology'] == technology) {
                        listImages[array[i]['title']] = array[i]['image'];
                    }
                }

                return listImages;
            }

            function selectPhrasesAboutTechnology(technology, array) {
                let listPhrases = {};

                for (let i = 0, c = array.length; i < c; i++) {
                    if (array[i]['technology'] == technology) {
                        listPhrases[array[i]['label']] = array[i]['phrase'];
                    }
                }

                return listPhrases;
            }

            function hOrD(element) {
                if (element) {
                    if (element.style.opacity > 0.5) {
                        element.style.opacity = 0;
                    } else {
                        element.style.opacity = 1;
                    }
                }
            }


            /*=========================================================================
            ================================ Objects ==================================
            ==========================================================================*/

            function ImageProperty(image, pLeft, pTop, imageSpeed) {
                this.image = image;
                this.pLeft = pLeft;
                this.pTop = pTop;
                this.imageSpeed = imageSpeed;

                this.imageWalkAround = function walkAround(image, pLeft, pTop, imageSpeed) {
                    if (image.style.display != 'none') {
                        pLeft += imageSpeed;

                        if (pLeft >= (document.body.offsetWidth + 50)) {
                            pLeft = -200;
                            image.style.top = randNum(0, (document.body.offsetHeight - 100));
                            image.style.display = 'none';
                        }

                        image.style.left = pLeft + 'px';
                        image.style.top = pTop + 'px';

                        window.requestAnimationFrame(function() {
                            walkAround(image, pLeft, pTop, imageSpeed);
                        });
                    }
                }
            }

            /*========================================================================
            ========================= Database Information ===========================
            ========================================================================*/

            let technologies = <?php echo json_encode($technologies); ?>,
                images = <?php echo json_encode($images); ?>,
                technologiesInformation = <?php echo json_encode($technologiesInformation); ?>,
                phrases = <?php echo json_encode($phrases); ?>;

            let backgroundPicture = [
                'BackgroundHome/man_glasses.jpeg',
                'BackgroundHome/medical1.jpg',
                'BackgroundHome/medical2.jpg',
                'BackgroundHome/girl-electronic.webp',
                'BackgroundHome/Quantum-Computing.jpg',
                'BackgroundHome/technologytrends.jpeg',
                'BackgroundHome/biohacker.png',
            ],
            indexBackgroundPicture = 0;

            /*========================================================================
            ============================= HTML Elements ==============================
            ========================================================================*/

            let mainTitle = document.getElementById('MAIN_title');

            /*=========================================================================
            ================================= Code ====================================
            ==========================================================================*/


            let page = document.getElementById('page'),
                pageBackgroundSize = getComputedStyle(page).backgroundSize;

            for (let i = 0, c = images.length; i < c; i++) {
                page.innerHTML += '<img class="IMAGE_technology" src="' + images[i]['image'] + '" alt="' + images[i]['technology'] + '" />';
            }

            let imageElements = document.querySelectorAll('.IMAGE_technology'),
                listImage = [];

            for (let i = 0, c = imageElements.length; i < c; i++) {
                objectImage = new ImageProperty(imageElements[i], -200, randNum(0, (window.innerHeight - 200), true), 0.6);
                imageElements[i].style.display = 'none';
                listImage.push(objectImage);
            }


            function homeImageAnimation(index = -1, startAnim = true) {
                if (startAnim || listImage[index].image.offsetLeft >= 180) {
                    index += 1;
                    startAnim = false;

                    if (index >= listImage.length) {
                        index = 0;
                    }

                    listImage[index].image.style.display = 'block';

                    listImage[index].imageWalkAround(listImage[index].image, listImage[index].pLeft, listImage[index].pTop, listImage[index].imageSpeed);
                }

                setTimeout(function() {
                    homeImageAnimation(index, startAnim);
                }, 1000);
            }

            homeImageAnimation();


            function homeBckgAnimation(bckgW = 101, bckgH = 101, bckgWIncrease = true, bckgHIncrease = true, bckgPH = 0, bckgPV = 0, limitReached = false) {
                if (bckgW >= 120) {
                    bckgWIncrease = false;
                    limitReached = true;
                } else if (bckgW <= 101) {
                    bckgWIncrease = true;
                    limitReached = true;
                }

                if (bckgH >= 120) {
                    bckgHIncrease = false;
                } else if (bckgH <= 101) {
                    bckgHIncrease = true;
                }

                if (bckgWIncrease) {
                    bckgW += 0.02;
                    bckgPH -= 0.1;
                } else {
                    bckgW -= 0.02;
                    bckgPH += 0.1;
                }

                if (bckgHIncrease) {
                    bckgH += 0.02;
                    bckgPV -= 0.15;
                } else {
                    bckgH -= 0.02;
                    bckgPV += 0.15;
                }

                page.style.backgroundSize = bckgW + '% ' + bckgH + '%';
                page.style.backgroundPosition = bckgPH + 'px ' + bckgPV + 'px';

                pageBackgroundSize = page.style.backgroundSize;

                if (!limitReached) {
                    window.requestAnimationFrame(function() {
                        homeBckgAnimation(bckgW, bckgH, bckgWIncrease, bckgHIncrease, bckgPH, bckgPV, limitReached);
                    });
                } else {
                    limitReached = false;

                    setTimeout(function() {
                        window.requestAnimationFrame(function() {
                            homeBckgAnimation(bckgW, bckgH, bckgWIncrease, bckgHIncrease, bckgPH, bckgPV, limitReached);
                        });
                    }, 4000);
                }
            }

            homeBckgAnimation();


            /*==========================================================================
            ================================= Events ===================================
            ==========================================================================*/

            let titleTechnologyImage = document.createElement('div');
            titleTechnologyImage.className = 'TITLE_TECHNOLOGY_image';
            document.body.appendChild(titleTechnologyImage);

            let idTitleTechnologyImage = null;

            for (let i = 0, c = imageElements.length; i < c; i++) {
                imageElements[i].addEventListener('mouseover', function(e) {
                    titleTechnologyImage.style.transition = 'none';

                    titleTechnologyImage.style.left = randNum(20, 60, true) + '%';
                    titleTechnologyImage.style.top = randNum(20, 70, true) + '%';
                    titleTechnologyImage.innerHTML = this.alt;
                    titleTechnologyImage.style.zIndex = 22;

                    idTitleTechnologyImage = setTimeout(function() {
                        titleTechnologyImage.style.transition = 'all linear 1000ms';

                        titleTechnologyImage.style.opacity = 1;
                    }, 1000);
                });

                imageElements[i].addEventListener('mouseout', function(e) {
                    clearTimeout(idTitleTechnologyImage);
                    titleTechnologyImage.style.opacity = 0;
                    titleTechnologyImage.style.zIndex = 1;
                });
            }

            let navigation = document.getElementById('navigation');

            navigation.style.opacity = 0;

            navigation.addEventListener('mouseover', function(e) {
                navigation.style.opacity = 1;
            });

            navigation.addEventListener('mouseout', function(e) {
                navigation.style.opacity = 0;
            });

            let RFIDChipsPhrases = selectPhrasesAboutTechnology('RFID Chips', phrases),
                RFIDChipsImages = selectImagesOfTechnology('RFID Chips', images),
                RFIDChipsPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[0]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[0]['category'] + '</div>' +
                '<div id="' + technologiesInformation[0]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[0]['category_description'] + '</div>' +
                '<p class="RFID_text RFID_intro">' + RFIDChipsPhrases['intro'] + '</p>' +
                '<p class="RFID_text RFID_TECHNICAL_explain1">' + RFIDChipsPhrases['technical explanation part1'] + '</p>' +
                '<p class="RFID_text RFID_TECHNICAL_explain2">' + RFIDChipsPhrases['technical explanation part2'] + '</p>' +
                '<p class="RFID_text RFID_APPLICATION_examples">' + RFIDChipsPhrases['RFID Applications'].split('|').join('<br /><br /><br />') + '</p>' +
                '<p class="RFID_text RFID_industries">' + RFIDChipsPhrases['RFID used in many industries'] + '</p>' +
                '<p class="RFID_text RFID_automobile">' + RFIDChipsPhrases['RFID automobile'] + '</p>' +
                '<p class="RFID_text RFID_pharmaceuticals">' + RFIDChipsPhrases['RFID pharmaceuticals'] + '</p>' +
                '<p class="RFID_text RFID_implanting">' + RFIDChipsPhrases['Implanting RFID'] + '</p>' +
                '<p class="RFID_text RFID_HUMAN_microchip">' + RFIDChipsPhrases['Human microchip implant'] + '</p>' +
                '<p class="RFID_text RFID_BIOHACKERS_surgery">' + RFIDChipsPhrases['Biohackers DIY surgery'] + '</p>' +
                '<p class="RFID_text RFID_HANDS_wrists">' + RFIDChipsPhrases['Implanted hands wrists'] + '</p>' +
                '<p class="RFID_text RFID_TEDIOUS_rituals">' + RFIDChipsPhrases['Eliminate tedious rituals'] + '</p>' +
                '<p class="RFID_text RFID_HOME_door">' + RFIDChipsPhrases['Home or door office'] + '</p>' +
                '<p class="RFID_text RFID_TAP_AND_GO_payments">' + RFIDChipsPhrases['tap-and-go payments'] + '</p>' +
                '<p class="RFID_text RFID_TRANSPORT_cards">' + RFIDChipsPhrases['RFID transport cards'] + '</p>' +
                '<p class="RFID_text RFID_MEDICAL_data">' + RFIDChipsPhrases['RFID medical data'] + '</p>' +
                '<p class="RFID_text RFID_PRIVACY_concerns">' + RFIDChipsPhrases['privacy concerns'] + '</p>' +
                '<p class="RFID_text RFID_STANDARD_specifications">' + RFIDChipsPhrases['standard specifications development'] + '</p>' +
                '<p class="RFID_text RFID_CRYPTOGRAPHY_methods">' + RFIDChipsPhrases['cryptography methods'] + '</p>' +
                '<p class="RFID_text RFID_ABOUT_biohackers">' + RFIDChipsPhrases['About biohackers'] + '</p>' +
                '<img class="EXAMPLE_RFID_image RFID_IMAGE_intro" src="' + RFIDChipsImages['RFID Chips'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_IMAGE_tag_intro" src="' + RFIDChipsImages['RFID Chip tag'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_IMAGE_explain1" src="' + RFIDChipsImages['RFID Chip yellow eye background'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_IMAGE_ELECTROMAGNETIC_field" src="' + RFIDChipsImages['Electromagnetic Field'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_IMAGE_structure" src="' + RFIDChipsImages['RFID structure'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_INVENTORY_management" src="' + RFIDChipsImages['Inventory management'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_ASSET_tracking" src="' + RFIDChipsImages['Asset tracking'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_PERSONNEL_tracking" src="' + RFIDChipsImages['Personnel tracking'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_CONTROLLING_access" src="' + RFIDChipsImages['Controlling access to restricted areas'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_ID_badging" src="' + RFIDChipsImages['ID Badging'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_SUPPLY_chain1" src="' + RFIDChipsImages['Supply chain management1'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_SUPPLY_chain2" src="' + RFIDChipsImages['Supply chain management2'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_AUTHENTIC_fake" src="' + RFIDChipsImages['AuthenticFake'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_COUNTERFEIT_good" src="' + RFIDChipsImages['Counterfeit goods'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_industry1" src="' + RFIDChipsImages['Industry1'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_industry2" src="' + RFIDChipsImages['Industry2'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_auto" src="' + RFIDChipsImages['RFID in auto'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_PRODUCTION_line" src="' + RFIDChipsImages['Car production line'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Pharmaceutical_logistics" src="' + RFIDChipsImages['Pharmaceutical logistics'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_FUTURE_OF_pharmacy" src="' + RFIDChipsImages['Future of Pharmacy'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_COW_scanning" src="' + RFIDChipsImages['Cow rfid scanning'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_animal_identification" src="' + RFIDChipsImages['Rfid animal identification'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_EARTAG_life" src="' + RFIDChipsImages['Eartag life'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_MICROCHIP_implant" src="' + RFIDChipsImages['Microchip implant'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_PETS_microchip" src="' + RFIDChipsImages['Pets microchip'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_CAT_microchip" src="' + RFIDChipsImages['Cat microchip'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_ANIMAL_id" src="' + RFIDChipsImages['RFID animal ID'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_CHIP_ON_hand" src="' + RFIDChipsImages['RFID Chip on hand'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_x-ray" src="' + RFIDChipsImages['Implants x-ray'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_rice" src="' + RFIDChipsImages['RFID rice'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_BIOHACKING_nutrients" src="' + RFIDChipsImages['Biohacking nutrients'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_BRAIN_chip" src="' + RFIDChipsImages['Brain chip'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_DNA_biohacking" src="' + RFIDChipsImages['Biohacking crispr'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_MAGNET_girl" src="' + RFIDChipsImages['Magnet girl'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_BIOHACKING_cyborg" src="' + RFIDChipsImages['Biohacking cyborg'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_BIOHACKER_goal" src="' + RFIDChipsImages['Biohacker goal'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_TATTOO_parlors1" src="' + RFIDChipsImages['Biohacker tattoo parlors1'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_TATTOO_parlors2" src="' + RFIDChipsImages['Biohacker tattoo parlors2'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_CHIP_AND_skin" src="' + RFIDChipsImages['RFID Chip and skin'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_RFID_NFC" src="' + RFIDChipsImages['RFID NFC'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_HAND_x-ray2" src="' + RFIDChipsImages['RFID hand x-ray2'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_wallet" src="' + RFIDChipsImages['RFID wallet'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_keys" src="' + RFIDChipsImages['RFID keys'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_HOME_CAR_computer" src="' + RFIDChipsImages['RFID home car computer'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_OPEN_door" src="' + RFIDChipsImages['RFID open door'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Swedish" src="' + RFIDChipsImages['Swedish RFID'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_RING_payment" src="' + RFIDChipsImages['Ring payment'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_CONTACTLESS_payments" src="' + RFIDChipsImages['Contactless payments'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_tram" src="' + RFIDChipsImages['Tram'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_MUMBAI_metro" src="' + RFIDChipsImages['Mumbai metro'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_PUBLIC_TRANSPORT_cards" src="' + RFIDChipsImages['Public transport cards'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Medical_history" src="' + RFIDChipsImages['Medical history'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Patient_medical_history" src="' + RFIDChipsImages['Patient medical history'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Personal_medical_data" src="' + RFIDChipsImages['Personal medical data'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Computer_patient_medical_data" src="' + RFIDChipsImages['Computer patient medical data'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Privacy_concerns" src="' + RFIDChipsImages['Privacy concerns'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_privacy" src="' + RFIDChipsImages['RFID privacy'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Hacker" src="' + RFIDChipsImages['Hacker'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Hacker_binary" src="' + RFIDChipsImages['Hacker binary'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Privacy_cryptography" src="' + RFIDChipsImages['Privacy cryptography'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Padlock" src="' + RFIDChipsImages['Padlock'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Addressing_privacy_concerns" src="' + RFIDChipsImages['Addressing privacy concerns'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_ISO_IEC" src="' + RFIDChipsImages['ISO IEC'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Cryptography_key" src="' + RFIDChipsImages['Cryptography key'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Cryptography_key2" src="' + RFIDChipsImages['Cryptography key2'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_Cryptography_text" src="' + RFIDChipsImages['Cryptography text'] + '" />' +
                '<img class="EXAMPLE_RFID_image RFID_rabbit_cat_dog_human" src="rabbit_cat_dog_human.jpg" />' +
                '<img class="EXAMPLE_RFID_image RFID_Pewdiepie_hmmm" src="pewdiepie.gif" />' +
                '<img class="EXAMPLE_RFID_image RFID_Batman_hmmm" src="batman.gif" />' +
                '<img class="EXAMPLE_RFID_image RFID_surprised_cat" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/fd7278f3-1785-4ebd-baeb-fb8d7c5fa201/dcsedkf-9b7246b7-9d72-4fd4-b61d-ba6999dbfedf.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZmQ3Mjc4ZjMtMTc4NS00ZWJkLWJhZWItZmI4ZDdjNWZhMjAxXC9kY3NlZGtmLTliNzI0NmI3LTlkNzItNGZkNC1iNjFkLWJhNjk5OWRiZmVkZi5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.S4qgPkBfmA1eXJNNiQqWRDninzW8tsZPPhkKeV_Qcfw" />',
            ];

            let ExoskeletonsPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[1]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[1]['category'] + '</div>' +
                '<div id="' + technologiesInformation[1]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[1]['category_description'] + '</div>',
            ];

            let AugmentedVisionPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[2]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[2]['category'] + '</div>' +
                '<div id="' + technologiesInformation[2]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[2]['category_description'] + '</div>',
            ];

            let SmartContactLensesPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[3]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[3]['category'] + '</div>' +
                '<div id="' + technologiesInformation[3]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[3]['category_description'] + '</div>',
            ];

            let ThreeDPrintedBodyPartsPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[4]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[4]['category'] + '</div>' +
                '<div id="' + technologiesInformation[4]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[4]['category_description'] + '</div>',
            ];

            let BrainComputerInterfacesPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[5]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[5]['category'] + '</div>' +
                '<div id="' + technologiesInformation[5]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[5]['category_description'] + '</div>',
            ];

            let DesignerBabiesPages = [
                '<h2 class="TECHNOLOGY_title">' + technologies[6]['name'] + '</h2>' +
                '<div class="TECHNOLOGY_category">' + technologiesInformation[6]['category'] + '</div>' +
                '<div id="' + technologiesInformation[6]['category'] + '" class="TECHNOLOGY_CATEGORY_description">' + technologiesInformation[6]['category_description'] + '</div>',
            ];

            let aboutTechnologies = document.querySelectorAll('.aboutTechnology');

            for (let i = 0, c = aboutTechnologies.length; i < c; i++) {
                aboutTechnologies[i].addEventListener('click', function(e) {
                    if (this.innerHTML == 'RFID Chips') {
                        content.innerHTML = RFIDChipsPages[0];
                    } else if (this.innerHTML == 'Exoskeletons') {
                        content.innerHTML = ExoskeletonsPages[0];
                    } else if (this.innerHTML == 'Augmented Vision') {
                        content.innerHTML = AugmentedVisionPages[0];
                    } else if (this.innerHTML == 'Smart Contact Lenses') {
                        content.innerHTML = SmartContactLensesPages[0];
                    } else if (this.innerHTML == '3D Printed Body Parts') {
                        content.innerHTML = ThreeDPrintedBodyPartsPages[0];
                    } else if (this.innerHTML == 'Brain-computer Interfaces') {
                        content.innerHTML = BrainComputerInterfacesPages[0];
                    } else if (this.innerHTML == 'Designer Babies') {
                        content.innerHTML = DesignerBabiesPages[0];
                    }

                    let technologyCategory = document.querySelectorAll('.TECHNOLOGY_category'),
                        technologyCategoryDescription = document.querySelectorAll('.TECHNOLOGY_CATEGORY_description');

                    for (let j = 0, d = technologyCategory.length; j < d; j++) {
                        technologyCategory[j].addEventListener('mouseover', function(e) {
                            for (let k = 0, e = technologyCategoryDescription.length; k < e; k++) {
                                if (this.innerHTML == technologyCategoryDescription[k].id) {
                                    technologyCategoryDescription[k].style.opacity = 1;
                                }
                            }
                        });

                        technologyCategory[j].addEventListener('mouseout', function(e) {
                            for (let k = 0, e = technologyCategoryDescription.length; k < e; k++) {
                                if (this.innerHTML == technologyCategoryDescription[k].id) {
                                    technologyCategoryDescription[k].style.opacity = 0;
                                }
                            }
                        });
                    }

                    content.style.opacity = 1;
                });
            }

            content.addEventListener('click', function(e) {
                this.style.opacity = 0;
            });

            let mainTitleIsHidden = true,
                hoverEnabledOnImage = false;

            document.body.addEventListener('keypress', function(e) {
                if (e.keyCode == 38) {
                    if (mainTitleIsHidden) {
                        mainTitleIsHidden = false;
                        mainTitle.style.opacity = 1;
                        mainTitle.style.zIndex = 20;
                    } else {
                        mainTitleIsHidden = true;
                        mainTitle.style.opacity = 0;
                        mainTitle.style.zIndex = 1;
                    }
                } else if (e.keyCode == 233) {
                    if (hoverEnabledOnImage) {
                        hoverEnabledOnImage = false;

                        for (let i = 0, c = imageElements.length; i < c; i++) {
                            imageElements[i].style.zIndex = 1;
                        }
                    } else {
                        hoverEnabledOnImage = true;

                        for (let i = 0, c = imageElements.length; i < c; i++) {
                            imageElements[i].style.zIndex = 20;
                        }
                    }
                } else if (e.keyCode == 34) {
                    indexBackgroundPicture += 1;

                    if (indexBackgroundPicture >= backgroundPicture.length) {
                        indexBackgroundPicture = 0;
                    }

                    page.style.background = 'url("' + backgroundPicture[indexBackgroundPicture] + '")';
                    page.style.backgroundSize = pageBackgroundSize;
                }

                let rfidText = document.querySelectorAll('.RFID_text'),
                    exampleRfidImage = document.querySelectorAll('.EXAMPLE_RFID_image');

                /* * * Hide Or Display Text * * */

                if (e.keyCode == 97) { // A letter
                    hOrD(rfidText[0]);
                } else if (e.keyCode == 122) { // Z letter
                    hOrD(rfidText[1]);
                } else if (e.keyCode == 101) { // E letter
                    hOrD(rfidText[2]);
                } else if (e.keyCode == 114) { // R letter
                    hOrD(rfidText[3]);
                } else if (e.keyCode == 116) { // T letter
                    hOrD(rfidText[4]);
                } else if (e.keyCode == 121) { // Y letter
                    hOrD(rfidText[5]);
                } else if (e.keyCode == 117) { // U letter
                    hOrD(rfidText[6]);
                } else if (e.keyCode == 105) { // I letter
                    hOrD(rfidText[7]);
                } else if (e.keyCode == 111) { // O letter
                    hOrD(rfidText[8]);
                } else if (e.keyCode == 112) { // P letter
                    hOrD(rfidText[9]);
                }

                /* * * Hide Ord Display Image * * */

                if (e.keyCode == 113) { // Q letter
                    hOrD(exampleRfidImage[0]);
                } else if (e.keyCode == 119) { // W letter
                    hOrD(exampleRfidImage[1]);
                } else if (e.keyCode == 65) { // A Maj letter
                    hOrD(rfidText[10]);
                } else if (e.keyCode == 81) { // Q Maj letter
                    hOrD(exampleRfidImage[38]);
                    hOrD(exampleRfidImage[39]);
                    hOrD(exampleRfidImage[40]);
                } else if (e.keyCode == 87) { // W Maj letter
                    hOrD(exampleRfidImage[67]);
                } else if (e.keyCode == 115) { // S letter
                    hOrD(exampleRfidImage[2]);
                } else if (e.keyCode == 120) { // X letter
                    hOrD(exampleRfidImage[4]);
                } else if (e.keyCode == 90) { // Z Maj letter
                    hOrD(rfidText[11]);
                } else if (e.keyCode == 83) { // S Maj letter
                    hOrD(exampleRfidImage[41]);
                    hOrD(exampleRfidImage[42]);
                } else if (e.keyCode == 88) { // X Maj letter
                    hOrD(exampleRfidImage[68]);

                } else if (e.keyCode == 100) { // D letter
                    hOrD(exampleRfidImage[3]);
                } else if (e.keyCode == 99) { // C letter

                } else if (e.keyCode == 69) { // E Maj letter
                    hOrD(rfidText[12]);
                } else if (e.keyCode == 68) { // D Maj letter
                    hOrD(exampleRfidImage[43]);
                    hOrD(exampleRfidImage[44]);
                } else if (e.keyCode == 67) { // C Maj letter
                    hOrD(exampleRfidImage[69]);

                } else if (e.keyCode == 102) { // F letter
                    hOrD(exampleRfidImage[5]);
                    hOrD(exampleRfidImage[6]);
                } else if (e.keyCode == 118) { // V letter
                    hOrD(exampleRfidImage[7]);
                } else if (e.keyCode == 82) { // R Maj letter
                    hOrD(exampleRfidImage[8]);
                    hOrD(exampleRfidImage[9]);
                } else if (e.keyCode == 70) { // F Maj letter
                    hOrD(exampleRfidImage[10]);
                    hOrD(exampleRfidImage[11]);
                } else if (e.keyCode == 86) { // V Maj letter
                    hOrD(exampleRfidImage[12]);
                    hOrD(exampleRfidImage[13]);
                } else if (e.keyCode == 103) { // G letter 
                    hOrD(exampleRfidImage[14]);
                } else if (e.keyCode == 98) { // B letter
                    hOrD(exampleRfidImage[15]);
                } else if (e.keyCode == 84) { // T Maj letter
                    hOrD(rfidText[13]);
                } else if (e.keyCode == 71) { // G Maj letter
                    hOrD(exampleRfidImage[45]);
                    hOrD(exampleRfidImage[46]);
                    hOrD(exampleRfidImage[47]);
                } else if (e.keyCode == 66) { // B Maj letter

                } else if (e.keyCode == 104) { // H letter
                    hOrD(exampleRfidImage[16]);
                } else if (e.keyCode == 110) { // N letter
                    hOrD(exampleRfidImage[17]);
                } else if (e.keyCode == 89) { // Y Maj letter
                    hOrD(rfidText[14]);
                } else if (e.keyCode == 72) { // H Maj letter
                    hOrD(exampleRfidImage[48]);
                    hOrD(exampleRfidImage[49]);
                    hOrD(exampleRfidImage[50]);


                } else if (e.keyCode == 78) { // N Maj letter

                } else if (e.keyCode == 106) { // J letter
                    hOrD(exampleRfidImage[18]);
                } else if (e.keyCode == 44) { // , character
                    hOrD(exampleRfidImage[19]);
                } else if (e.keyCode == 85) { // U Maj letter
                    hOrD(rfidText[15]);
                } else if (e.keyCode == 74) { // J Maj letter
                    hOrD(exampleRfidImage[51]);
                    hOrD(exampleRfidImage[52]);
                    hOrD(exampleRfidImage[53]);
                    hOrD(exampleRfidImage[54]);
                } else if (e.keyCode == 107) { // K letter
                    hOrD(exampleRfidImage[20]);
                    hOrD(exampleRfidImage[21]);
                } else if (e.keyCode == 59) { // ; character
                    hOrD(exampleRfidImage[22]);
                } else if (e.keyCode == 73) { // I Maj letter
                    hOrD(exampleRfidImage[23]);
                    hOrD(exampleRfidImage[24]);
                } else if (e.keyCode == 75) { // K Maj letter
                    hOrD(exampleRfidImage[25]);
                    hOrD(exampleRfidImage[26]);
                } else if (e.keyCode == 108) { // L letter
                    hOrD(exampleRfidImage[27]);
                } else if (e.keyCode == 58) { // : character
                    hOrD(exampleRfidImage[28]);
                    hOrD(exampleRfidImage[29]);
                } else if (e.keyCode == 79) { // O Maj letter
                    hOrD(rfidText[16]);
                } else if (e.keyCode == 76) { // L Maj letter
                    hOrD(exampleRfidImage[55]);
                    hOrD(exampleRfidImage[56]);
                    hOrD(exampleRfidImage[57]);


                } else if (e.keyCode == 109) { // M letter
                    hOrD(rfidText[19]);
                    hOrD(exampleRfidImage[30]);
                    hOrD(exampleRfidImage[31]);
                    hOrD(exampleRfidImage[32]);
                    hOrD(exampleRfidImage[33]);
                    hOrD(exampleRfidImage[34]);
                    hOrD(exampleRfidImage[35]);
                } else if (e.keyCode == 33) { // ! character
                    hOrD(exampleRfidImage[36]);
                    hOrD(exampleRfidImage[37]);
                } else if (e.keyCode == 80) { // P Maj letter
                    hOrD(rfidText[17]);
                } else if (e.keyCode == 77) { // M Maj letter
                    hOrD(exampleRfidImage[58]);
                    hOrD(exampleRfidImage[59]);
                    hOrD(exampleRfidImage[60]);
                    hOrD(exampleRfidImage[61]);

                } else if (e.keyCode == 217) { // ù Maj
                    hOrD(rfidText[18]);
                } else if (e.keyCode == 36) { // $ Maj
                    hOrD(exampleRfidImage[62]);
                    hOrD(exampleRfidImage[63]);
                    hOrD(exampleRfidImage[64]);
                    hOrD(exampleRfidImage[65]);
                } else if (e.keyCode == 42) { // * Maj
                    hOrD(exampleRfidImage[66]);
                }
            });


            /*---------- Ajax ------------*/


            let cssStyle = document.getElementById('cssStyle');

            function getResponse(element) {
                let xhr = new XMLHttpRequest();

                xhr.open('GET', 'script.php');

                xhr.addEventListener('readystatechange', function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        element.innerHTML = xhr.responseText;
                    }
                });

                xhr.send(null);
            }

            function update() {
                getResponse(cssStyle);

                setTimeout(update, 1000);
            }

            update();
        </script>
    </body>
</html>
