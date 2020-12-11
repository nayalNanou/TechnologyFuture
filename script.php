<style type="text/css">
    @font-face {
        font-family: 'Police1';
        src: url("Police/ttf_007.ttf");
    }

    :root {
        font-family: 'Police1';
        cursor: none;
    }

    body {
        margin: 0px;
        overflow: hidden;
    }

    .MAIN_title {
        position: absolute;
        top: 0px;
        right: 0px;
        background: black;
        padding: 20px 0px;
        padding-left: 80px;
        padding-right: 14px;
        font-size: 3.2em;
        border-radius: 0px 0px 0px 100px;
        color: white;
        opacity: 0;
        z-index: 5;
        transition: all linear 4000ms;
    }

    main {
        display: flex;
        justify-content: space-between;
        background: url("BackgroundHome/man_glasses.jpeg") 0% 0px;
        background-size: 101% 101%;
    }

    .content {
        width: 79%;
        height: 100vh;
        opacity: 0;
        background: white;
        z-index: 10;
        transition: all linear 1000ms;
        position: relative;
        box-shadow: 0px 0px 10px black;
    }

    header {
        border: 1px solid black;
        width: 21%;
        height: 100vh;
        background: url("https://cdn.dribbble.com/users/68473/screenshots/594852/glowmatix-small.gif");
        transition: all linear 1000ms;
        z-index: 10;
    }

    nav {
        height: 100%;
    }

    ul {
        list-style-type: none;
        padding: 0px;
        margin: 0px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    ul > li {
        background: rgba(250, 250, 250, 1);
        color: white;
        text-shadow: 0px 0px 4px black;
        width: 80%;
        padding: 14px 0px;
        font-size: 1.4em;
        text-align: center;
        border-radius: 12px;
        transition: all linear 500ms;
    }

    ul > li:hover {
        background: black;
        transform: scale(1.1);
    }

    .IMAGE_technology {
        width: 200px;
        height: 200px;
        border-radius: 100%;
        position: absolute;
        transition: all linear 1000ms;
        z-index: 1;
        box-shadow: 0px 0px 10px white;
    }

    .IMAGE_technology:hover {
        transform: scale(1.12);
        box-shadow: 0px 0px 14px black;
    }

    .TITLE_TECHNOLOGY_image {
        background: rgba(255, 255, 255, 0.8);
        color: black;
        padding: 40px 80px;
        text-align: center;
        border-radius: 20px;
        position: absolute;
        top: 40%;
        right: 44%;
        width: max-content;
        transition: all linear 1000ms;
        font-size: 3em;
        opacity: 0;
    }

    /*====================================================*/
    /*================ Technology Pages ==================*/
    /*====================================================*/


    .TECHNOLOGY_title {
        font-size: 3.6em;
        margin-left: 100px;
        color: black;
        padding: 10px 20px;
        width: max-content;
        border-radius: 10px;
    }

    .TECHNOLOGY_category, .TECHNOLOGY_CATEGORY_description  {
        font-size: 1.5em;
        background: silver
        color: black;
        border: 1px solid black;
        padding: 10px 20px;
        width: max-content;
        position: absolute;
        right: 20px;
        top: 20px;
        border-radius: 20px;
        z-index: 30;
    }

    .TECHNOLOGY_CATEGORY_description {
        width: 300px;
        padding: 10px 40px;
        font-size: 1.25em;
        top: 80px;
        right: 40px;
        opacity: 0;
        transition: all linear 1000ms;
    }

    @keyframes animImage {
        0% {
            transform: translate(0px, 0px);
        } 20% {
            transform: translate(20px, 0px);
        } 80% {
            transform: translate(-20px, 0px);
        } 100% {
            transform: translate(0px, 0px);
        }
    }


    /*==========================================*/
    /*=============== RFID CHips ===============*/
    /*==========================================*/


    .RFID_text {
        opacity: 0;
        transition: all linear 1000ms;
    }

    /********** RFID Image ***********/


    .EXAMPLE_RFID_image {
        width: 550px;
        height: 450px;
        border-radius: 20px;
        position: absolute;
        animation-name: animImage;
        animation-duration: 60000ms;
        animation-iteration-count: infinite;
        opacity: 0;
        transition: all linear 1000ms;
        bottom: 20px;
    }

    .RFID_IMAGE_intro {
        left: 26%;
    }

    .RFID_IMAGE_tag_intro {
        left: 10%;
    }

    .RFID_IMAGE_explain1 {
        left: 60px;
    }

    .RFID_IMAGE_ELECTROMAGNETIC_field {
        bottom: 30px;
        width: 700px;
        left: 200px;
    }

    .RFID_IMAGE_structure {
        right: 200px;
    }

    .RFID_PERSONNEL_tracking {
        right: 40px;
        bottom: 70px;
    }

    .RFID_CONTROLLING_access {
        right: 40px;
        bottom: 30px;
        width: 350px;
        height: 280px;
    }

    .RFID_ID_badging {
        right: 220px;
        top: 30px;
        width: 250px;
        height: 400px;
    }

    .RFID_SUPPLY_chain1 {
        right: 30px;
        top: 100px;
        width: 440px;
        height: 330px;
    }

    .RFID_SUPPLY_chain2 {
        width: 400px;
        height: 280px;
        right: 110px;
        bottom: 30px;
    }

    .RFID_AUTHENTIC_fake {
        right: 50px;
        bottom: 30px;
        width: 390px;
        height: 270px;
    }

    .RFID_COUNTERFEIT_good {
        right: 110px;
        top: 90px;
        width: 450px;
        height: 330px;
    }

    .RFID_industry1 {
        right: 270px;
        bottom: 40px;
    }

    .RFID_industry2 {
        left: 100px;
        bottom: 40px;
        width: 640px;
    }

    .RFID_auto {
        left: 80px;
        bottom: 30px;
        width: 650px;
    }

    .RFID_PRODUCTION_line {
        width: 620px;
        left: 280px;
        bottom: 40px;
    }

    .RFID_Pharmaceutical_logistics {
        left: 40px;
        bottom: 24px;
        width: 500px;
        height: 420px;
    }

    .RFID_FUTURE_OF_pharmacy {
        bottom: 80px;
        right: 40px;
        width: 480px;
        height: 380px;
    }

    .RFID_COW_scanning {
        left: 40px;
        height: 400px;
        width: 500px;
    }

    .RFID_animal_identification {
        right: 40px;
        bottom: 80px;
        height: 420px;
    }

    .RFID_EARTAG_life {
        width: 780px;
        left: 60px;
        bottom: 24px;
    }

    .RFID_MICROCHIP_implant {
        right: 30px;
        bottom: 40px;
    }

    .RFID_PETS_microchip {
        left: 40px;
        bottom: 60px;
        width: 500px;
        height: 380px;
    }

    .RFID_CAT_microchip {
        width: 470px;
        height: 330px;
        left: 60px;
        bottom: 60px;
    }

    .RFID_ANIMAL_id {
        right: 20px;
        bottom: 30px;
    }

    .RFID_CHIP_ON_hand {
        left: 60px;
        bottom: 40px;
        width: 490px;
        height: 376px;
    }

    .RFID_x-ray {
        right: 30px;
        height: 370px;
        width: 500px;
        bottom: 40px;
    }

    .RFID_rice {
        top: 20px;
        left: 48%;
        width: 180px;
        height: 150px;
    }

    .RFID_BIOHACKING_nutrients {
        left: 40%;
        width: 300px;
        height: 240px;
        bottom: 216px;
    }

    .RFID_BRAIN_chip {
        right: 30px;
        width: 280px;
        height: 200px;
        bottom: 216px;
    }

    .RFID_DNA_biohacking {
        left: 50px;
        bottom: 30px;
        width: 350px;
        height: 290px;
    }

    .RFID_MAGNET_girl {
        top: 20px;
        left: 520px;
        width: 190px;
        height: 160px;
    }

    .RFID_BIOHACKING_cyborg {
        right: 50px;
        width: 270px;
        height: 210px;
        top: 100px;
    }

    .RFID_BIOHACKER_goal {
        left: 140px;
        bottom: 340px;
        height: 70px;
        width: 100px;
        z-index: 20;
    }

    .RFID_BIOHACKER_goal:hover {
        bottom: 40px;
        width: 760px;
        height: 580px;
        transition: all ease 3000ms;
        box-shadow: 0px 0px 20px black;
    }

    .RFID_TATTOO_parlors1 {
        width: 500px;
        height: 400px;
        left: 50px;
        bottom: 30px;
    }

    .RFID_TATTOO_parlors2 {
        right: 30px;
        bottom: 60px;
        width: 480px;
        height: 370px;
    }

    .RFID_CHIP_AND_skin {
        width: 480px;
        height: 300px;
        left: 40px;
        bottom: 40px;
    }

    .RFID_RFID_NFC {
        width: 280px;
        height: 220px;
        top: 150px;
        left: 60px;
    }

    .RFID_HAND_x-ray2 {
        right: 30px;
        bottom: 80px;
        height: 300px;
    }

    .RFID_wallet {
        left: 44px;
    }

    .RFID_keys {
        right: 40px;
        bottom: 100px;
        height: 370px;
        width: 500px;
    }

    .RFID_HOME_CAR_computer {
        left: 70px;
        bottom: 30px;
        width: 480px;
        height: 340px;
    }

    .RFID_OPEN_door {
        right: 30px;
        top: 230px;
        width: 460px;
        height: 310px;
    }

    .RFID_Swedish {
        left: 90px;
        bottom: 30px;
        width: 420px;
        height: 300px;
    }

    .RFID_RING_payment {
        right: 60px;
        bottom: 30px;
        width: 440px;
        height: 300px;
    }

    .RFID_CONTACTLESS_payments {
        right: 30px;
        width: 440px;
        height: 280px;
        top: 100px;
    }

    .RFID_tram {
        right: 80px;
        bottom: 30px;
        width: 500px;
        height: 280px;
    }

    .RFID_MUMBAI_metro {
        width: 420px;
        height: 280px;
        left: 40px;
        bottom: 30px;
    }

    .RFID_PUBLIC_TRANSPORT_cards {
        right: 40px;
        top: 110px;
        width: 450px;
        height: 300px;
    }

    .RFID_Medical_history {
        right: 60px;
        bottom: 60px;
        height: 260px;
        width: 500px;
    }

    .RFID_Patient_medical_history {
        width: 200px;
        height: 140px;
        right: 400px;
        top: 20px;
    }

    .RFID_Personal_medical_data {
        right: 40px;
        top: 120px;
        width: 280px;
        height: 240px;
    }

    .RFID_Computer_patient_medical_data {
        left: 60px;
        bottom: 40px;
        width: 420px;
        height: 380px;
    }

    .RFID_Privacy_concerns {
        right: 40px;
        width: 450px;
        height: 300px;
        bottom: 40px;
    }

    .RFID_privacy {
        right: 30px;
        width: 300px;
        height: 200px;
        bottom: 400px;
    }

    .RFID_Hacker {
        left: 50px;
        bottom: 40px;
        width: 490px;
        height: 360px;
    }

    .RFID_Hacker_binary {
        left: 70px;
        bottom: 30px;
        width: 520px;
        height: 400px;
    }

    .RFID_Privacy_cryptography {
        top: 20px;
        left: 510px;
        width: 230px;
        height: 150px;
    }

    .RFID_Padlock {
        right: 20px;
        bottom: 400px;
        width: 300px;
        height: 200px;
    }

    .RFID_Addressing_privacy_concerns {
        right: 30px;
        bottom: 30px;
        width: 400px;
        height: 300px;
    }

    .RFID_ISO_IEC {
        right: 90px;
        bottom: 70px;
        width: 300px;
        height: 240px;
    }

    .RFID_Cryptography_key {
        top: 20px;
        left: 490px;
        width: 220px;
        height: 140px;
    }

    .RFID_Cryptography_key2 {
        left: 70px;
        bottom: 30px;
        width: 540px;
        height: 400px;
    }

    .RFID_Cryptography_text {
        right: 30px;
        width: 320px;
        height: 220px;
        top: 140px;
    }

    .RFID_rabbit_cat_dog_human {
        left: 400px;
        bottom: 40px;
    }

    @keyframes movement {
        0% {
            top: 20px;
        } 50% {
            top: 400px;
        } 100% {
            top: 20px;
        }
    }

    @keyframes movement2 {
        0% {
            box-shadow: -130px -20px 10px black;
            left: 20px;
        } 50% {
            box-shadow: -200px -20px 10px black;
            left: 320px;
        } 100% {
            box-shadow: -130px -20px 10px black;
            left: 220px;
        }
    }

    .RFID_Pewdiepie_hmmm {
        animation-name: movement2;
        animation-duration: 20000ms;
        animation-iteration: infinite;
        opacity: 0;
        left: 220px;
        top: 20px;
        width: 340px;
        height: 240px;
        z-index: 30;
        box-shadow: -130px -20px 10px black;
        border-radius: 0px;
    }

    .RFID_Batman_hmmm {
        left: -200px;
        top: 20px;
        width: 300px;
        height: 200px;
        border-radius: 0px;
    }


    /************* End RFID Image *************/

    /************* RFID CSS Text **************/

    .RFID_text {
        width: 650px;
        padding: 10px 20px;
        color: black;
        border: 1px solid silver;
        border-radius: 20px;
        position: absolute;
        font-size: 1.3em;
    }

    .RFID_intro {
        left: 50px;
        top: 155px;
    }

    .RFID_TECHNICAL_explain1 {
        right: 80px;
        top: 165px;
    }

    .RFID_TECHNICAL_explain2 {
        right: 80px;
        top: 165px;
        font-size: 1.35em;
        padding: 15px 30px;
    }

    .RFID_APPLICATION_examples {
        width: 460px;
        left: 20px;
        bottom: 34px;
        padding: 30px 20px;
    }

    .RFID_INVENTORY_management {
        right: 20px;
        top: 100px;
        width: 450px;
        height: 310px;
    }

    .RFID_ASSET_tracking {
        right: 120px;
        bottom: 30px;
        width: 450px;
        height: 300px;
    }

    .RFID_industries {
        left: 40px;
        top: 150px;
        font-size: 1.35em;
    }

    .RFID_automobile {
        left: 130px;
        top: 150px;
        width: 700px;
    }

    .RFID_pharmaceuticals {
        left: 50px;
        top: 170px;
    }

    .RFID_implanting {
        width: 760px;
        left: 180px;
        top: 150px;
    }

    .RFID_HUMAN_microchip {
        width: 800px;
        left: 50px;
        top: 170px;
    }

    .RFID_BIOHACKERS_surgery {
        left: 30px;
    }

    .RFID_ABOUT_biohackers {
        right: 30px;
        bottom: 30px;
        font-size: 1.14em;
        width: 500px;
        letter-spacing: 0.08em;
        padding: 12px 30px;
    }

    .RFID_HANDS_wrists {
        right: 60px;;
        top: 200px;
    }

    .RFID_TEDIOUS_rituals {
        left: 40px;
        top: 170px;
    }

    .RFID_HOME_door {
        width: 520px;
        left: 40px;
        top: 160px;
    }

    .RFID_TAP_AND_GO_payments {
        width: 520px;
        left: 40px;
        top: 260px;
    }

    .RFID_TRANSPORT_cards {
        width: 520px;
        left: 40px;
        top: 340px;
    }

    .RFID_MEDICAL_data {
        left: 80px;
        top: 180px;
    }

    .RFID_PRIVACY_concerns {
        left: 40px;
        top: 160px;
    }

    .RFID_STANDARD_specifications {
        left: 80px;
        top: 170px;
    }

    .RFID_CRYPTOGRAPHY_methods {
        left: 40px;
        top: 160px;
    }


    /******** End RFID Text *********/


    /*========================================*/
    /*============ End RFID Chip =============*/
    /*========================================*/
</style>
