<?php

/* require '/Users/shahinm/Documents/git/Work/php-webdriver/__init__.php';

  $webdriver = new WebDriver();


  $session = $webdriver->session('firefox', array());
  $session->open("https://www.golookonline.com/creditrepair/credit-expert/");
  $form = $session->element('name', 'theForm');




  $session->close();
 */


//require '/Users/shahinm/Documents/git/Work/php-webdriver/__init__.php';

require_once "/Users/shahinm/Documents/git/Work/php-webdriver-bindings-0.9.0/phpwebdriver/WebDriver.php";

$links = array(
    "http://www.golookonline.com/r/4bb5012d31/?",
    "http://www.golookonline.com/r/4bb503643b/?",
    "http://www.golookonline.com/r/4bb503b2f3/?",
    "http://www.golookonline.com/r/4bb50eca65/?",
    "http://www.golookonline.com/r/4bb62ad4c9/?",
    "http://www.golookonline.com/r/4bbd12146b/?",
    "http://www.golookonline.com/r/4bc36b1556/?",
    "http://www.golookonline.com/r/4bc50f9559/?",
    "http://www.golookonline.com/r/4bc5fae160/?",
    "http://www.golookonline.com/r/4bd5dc2804/?",
    "http://www.golookonline.com/r/4bd78cab92/?",
    "http://www.golookonline.com/r/4bd865daef/?",
    "http://www.golookonline.com/r/4bda01e10b/?",
    "http://www.golookonline.com/r/4bda02cd4a/?",
    "http://www.golookonline.com/r/4bda02f1b2/?",
    "http://www.golookonline.com/r/4bdfa17b33/?",
    "http://www.golookonline.com/r/4be05d2b96/?",
    "http://www.golookonline.com/r/4be07ebea8/?",
    "http://www.golookonline.com/r/4be9ca2e27/?",
    "http://www.golookonline.com/r/4bf2f0aa3b/?",
    "http://www.golookonline.com/r/4bfaecf42b/?",
    "http://www.golookonline.com/r/4c0e989e2d/?",
    "http://www.golookonline.com/r/4c0eb0e366/?",
    "http://www.golookonline.com/r/4c0fbe04b7/?",
    "http://www.golookonline.com/r/4c111e2f07/?",
    "http://www.golookonline.com/r/4c20eb4ec0/?",
    "http://www.golookonline.com/r/4c22585c3c/?",
    "http://www.golookonline.com/r/4c3620f042/?",
    "http://www.golookonline.com/r/4c3de51e25/?",
    "http://www.golookonline.com/r/4c471cdbdc/?",
    "http://www.golookonline.com/r/4c4f4c8971/?",
    "http://www.golookonline.com/r/4c56ff85c7/?",
    "http://www.golookonline.com/r/4c60466f82/?",
    "http://www.golookonline.com/r/4c76e84de3/?",
    "http://www.golookonline.com/r/4c77120192/?",
    "http://www.golookonline.com/r/4c914f5719/?",
    "http://www.golookonline.com/r/4c9298cdb9/?",
    "http://www.golookonline.com/r/4c92996eea/?",
    "http://www.golookonline.com/r/4c9299d5f3/?",
    "http://www.golookonline.com/r/4ca6550790/?",
    "http://www.golookonline.com/r/4ca6554f6f/?",
    "http://www.golookonline.com/r/4cab570932/?",
    "http://www.golookonline.com/r/4cab570baa/?",
    "http://www.golookonline.com/r/4cad1a508a/?",
    "http://www.golookonline.com/r/4cae1035e7/?",
    "http://www.golookonline.com/r/4cae10d328/?",
    "http://www.golookonline.com/r/4caf5c241d/?",
    "http://www.golookonline.com/r/4caf5d48c5/?",
    "http://www.golookonline.com/r/4caf6045c9/?",
    "http://www.golookonline.com/r/4caf608567/?",
    "http://www.golookonline.com/r/4cb4c76bd4/?",
    "http://www.golookonline.com/r/4cb5e68b35/?",
    "http://www.golookonline.com/r/4cb5e6c3c9/?",
    "http://www.golookonline.com/r/4cbf2025f0/?",
    "http://www.golookonline.com/r/4ccb0b6e14/?",
    "http://www.golookonline.com/r/4cdc6d04c7/?",
    "http://www.golookonline.com/r/4ce70c8764/?",
    "http://www.golookonline.com/r/4ceb13b104/?",
    "http://www.golookonline.com/r/4cf41ae707/?",
    "http://www.golookonline.com/r/4cf41bb250/?",
    "http://www.golookonline.com/r/4cf42c8ad0/?",
    "http://www.golookonline.com/r/4cf4470453/?",
    "http://www.golookonline.com/r/4cf56feb68/?",
    "http://www.golookonline.com/r/4cf5701fbd/?",
    "http://www.golookonline.com/r/4cf6a2f48a/?",
    "http://www.golookonline.com/r/4cf6a3a2a4/?",
    "http://www.golookonline.com/r/4cf6a6eabd/?",
    "http://www.golookonline.com/r/4cf6a711f2/?",
    "http://www.golookonline.com/r/4cf6ebfd64/?",
    "http://www.golookonline.com/r/4cfd3f970a/?",
    "http://www.golookonline.com/r/4cfd4e354f/?",
    "http://www.golookonline.com/r/4cffbe3a96/?",
    "http://www.golookonline.com/r/4cffe09c03/?",
    "http://www.golookonline.com/r/4cffe0e209/?",
    "http://www.golookonline.com/r/4d012a05ca/?",
    "http://www.golookonline.com/r/4d012a3c14/?",
    "http://www.golookonline.com/r/4d015457a8/?",
    "http://www.golookonline.com/r/4d0663c57c/?",
    "http://www.golookonline.com/r/4d0664752c/?",
    "http://www.golookonline.com/r/4d0664758e/?",
    "http://www.golookonline.com/r/4d06647831/?",
    "http://www.golookonline.com/r/4d06650228/?",
    "http://www.golookonline.com/r/4d067de110/?",
    "http://www.golookonline.com/r/4d067e4b06/?",
    "http://www.golookonline.com/r/4d068406ce/?",
    "http://www.golookonline.com/r/4d0684eb95/?",
    "http://www.golookonline.com/r/4d06b3e657/?",
    "http://www.golookonline.com/r/4d07a9220a/?",
    "http://www.golookonline.com/r/4d07aa3541/?",
    "http://www.golookonline.com/r/4d07bbb688/?",
    "http://www.golookonline.com/r/4d07bc67a4/?",
    "http://www.golookonline.com/r/4d08f442b0/?",
    "http://www.golookonline.com/r/4d0baa4c75/?",
    "http://www.golookonline.com/r/4d0baadc6f/?",
    "http://www.golookonline.com/r/4d0fecefa6/?",
    "http://www.golookonline.com/r/4d12492539/?",
    "http://www.golookonline.com/r/4d1249d3ac/?",
    "http://www.golookonline.com/r/4d12589194/?",
    "http://www.golookonline.com/r/4d18fa9b9b/?",
    "http://www.golookonline.com/r/4d18fafb39/?",
    "http://www.golookonline.com/r/4d1cf845e1/?",
    "http://www.golookonline.com/r/4d1d097f8b/?",
    "http://www.golookonline.com/r/4d1d0984ae/?",
    "http://www.golookonline.com/r/4d23790da4/?",
    "http://www.golookonline.com/r/4d23847574/?",
    "http://www.golookonline.com/r/4d2384ec08/?",
    "http://www.golookonline.com/r/4d25088915/?",
    "http://www.golookonline.com/r/4d26018127/?",
    "http://www.golookonline.com/r/4d26645aae/?",
    "http://www.golookonline.com/r/4d27a1bcdf/?",
    "http://www.golookonline.com/r/4d27a20011/?",
    "http://www.golookonline.com/r/4d3473f90e/?",
    "http://www.golookonline.com/r/4d34a001bb/?",
    "http://www.golookonline.com/r/4d34a12a2c/?",
    "http://www.golookonline.com/r/4d34b6538b/?",
    "http://www.golookonline.com/r/4d34c91626/?",
    "http://www.golookonline.com/r/4d3758c351/?",
    "http://www.golookonline.com/r/4d3763c92c/?",
    "http://www.golookonline.com/r/4d3f4cb5af/?",
    "http://www.golookonline.com/r/4d40a9d34b/?",
    "http://www.golookonline.com/r/4d40c66357/?",
    "http://www.golookonline.com/r/4d48a66a0d/?",
    "http://www.golookonline.com/r/4d49bc4097/?",
    "http://www.golookonline.com/r/4d50523e46/?",
    "http://www.golookonline.com/r/4d50a742b8/?",
    "http://www.golookonline.com/r/4d50a79a56/?",
    "http://www.golookonline.com/r/4d5314853a/?",
    "http://www.golookonline.com/r/4d542190e9/?",
    "http://www.golookonline.com/r/4d5424f8e3/?",
    "http://www.golookonline.com/r/4d55b8bc91/?",
    "http://www.golookonline.com/r/4d5976c603/?",
    "http://www.golookonline.com/r/4d598ddf02/?",
    "http://www.golookonline.com/r/4d5b292030/?",
    "http://www.golookonline.com/r/4d5b2fc7e7/?",
    "http://www.golookonline.com/r/4d5b307ef1/?",
    "http://www.golookonline.com/r/4d5ed8b0bd/?",
    "http://www.golookonline.com/r/4d66d240c4/?",
    "http://www.golookonline.com/r/4d66d62b54/?",
    "http://www.golookonline.com/r/4d684e1f26/?",
    "http://www.golookonline.com/r/4d6befd95f/?",
    "http://www.golookonline.com/r/4d77cb0b7c/?",
    "http://www.golookonline.com/r/4d782c83dc/?",
    "http://www.golookonline.com/r/4d7951539c/?",
    "http://www.golookonline.com/r/4d7fded356/?",
    "http://www.golookonline.com/r/4d82396156/?",
    "http://www.golookonline.com/r/4d83d8e54f/?",
    "http://www.golookonline.com/r/4d87943a13/?",
    "http://www.golookonline.com/r/4d88dd57c6/?",
    "http://www.golookonline.com/r/4d89495631/?",
    "http://www.golookonline.com/r/4d8a2c740a/?",
    "http://www.golookonline.com/r/4d8b83b37f/?",
    "http://www.golookonline.com/r/4d8bb6521d/?",
    "http://www.golookonline.com/r/4d920f5b82/?",
    "http://www.golookonline.com/r/4d92289635/?",
    "http://www.golookonline.com/r/4d923d0607/?",
    "http://www.golookonline.com/r/4d9253bc89/?",
    "http://www.golookonline.com/r/4d94b1113c/?",
    "http://www.golookonline.com/r/4d99fd9d89/?",
    "http://www.golookonline.com/r/4d9a3d4689/?",
    "http://www.golookonline.com/r/4d9a43fb0c/?",
    "http://www.golookonline.com/r/4d9a44b9ad/?",
    "http://www.golookonline.com/r/4d9a5c3d32/?",
    "http://www.golookonline.com/r/4d9b53a366/?",
    "http://www.golookonline.com/r/4d9b53c871/?",
    "http://www.golookonline.com/r/4d9b9a1248/?",
    "http://www.golookonline.com/r/4d9b9ca7cd/?",
    "http://www.golookonline.com/r/4d9caeedb4/?",
    "http://www.golookonline.com/r/4d9cb1d9a3/?",
    "http://www.golookonline.com/r/4d9dfade66/?",
    "http://www.golookonline.com/r/4d9e0862c2/?",
    "http://www.golookonline.com/r/4d9e480904/?",
    "http://www.golookonline.com/r/4d9e4b4f1c/?",
    "http://www.golookonline.com/r/4d9e59ad77/?",
    "http://www.golookonline.com/r/4d9f4f2c93/?",
    "http://www.golookonline.com/r/4d9f4f717e/?",
    "http://www.golookonline.com/r/4da36812b4/?",
    "http://www.golookonline.com/r/4da37662c2/?",
    "http://www.golookonline.com/r/4da3816fa2/?",
    "http://www.golookonline.com/r/4da7216a4f/?",
    "http://www.golookonline.com/r/4dac7f9fef/?",
    "http://www.golookonline.com/r/4dac7fc38a/?",
    "http://www.golookonline.com/r/4dac80b436/?",
    "http://www.golookonline.com/r/4daf740a28/?",
    "http://www.golookonline.com/r/4daf77937c/?",
    "http://www.golookonline.com/r/4daf7880aa/?",
    "http://www.golookonline.com/r/4db0659266/?",
    "http://www.golookonline.com/r/4db0c3d74f/?",
    "http://www.golookonline.com/r/4db0dc9018/?",
    "http://www.golookonline.com/r/4db766c8de/?",
    "http://www.golookonline.com/r/4db9b4d597/?",
    "http://www.golookonline.com/r/4dbaf9c0d3/?",
    "http://www.golookonline.com/r/4dbef7cb9b/?",
    "http://www.golookonline.com/r/4dbf45ecef/?",
    "http://www.golookonline.com/r/4dc073a32a/?",
    "http://www.golookonline.com/r/4dc1839d2a/?",
    "http://www.golookonline.com/r/4dc1a67c51/?",
    "http://www.golookonline.com/r/4dc1c10117/?",
    "http://www.golookonline.com/r/4dc1c1498c/?",
    "http://www.golookonline.com/r/4dc1c14a59/?",
    "http://www.golookonline.com/r/4dc1f5c752/?",
    "http://www.golookonline.com/r/4dc2e6f6db/?",
    "http://www.golookonline.com/r/4dc445775e/?",
    "http://www.golookonline.com/r/4dc87c6d1d/?",
    "http://www.golookonline.com/r/4dc9e1a786/?",
    "http://www.golookonline.com/r/4dcb2fd08e/?",
    "http://www.golookonline.com/r/4dcc0a8750/?",
    "http://www.golookonline.com/r/4dcc7c6632/?",
    "http://www.golookonline.com/r/4dd1af51af/?",
    "http://www.golookonline.com/r/4dd2e6cb0f/?",
    "http://www.golookonline.com/r/4dd56ca328/?",
    "http://www.golookonline.com/r/4ddab82724/?",
    "http://www.golookonline.com/r/4ddab849b4/?",
    "http://www.golookonline.com/r/4ddd708f76/?",
    "http://www.golookonline.com/r/4ddeb75082/?",
    "http://www.golookonline.com/r/4ddfd0a315/?",
    "http://www.golookonline.com/r/4de01ad201/?",
    "http://www.golookonline.com/r/4de5673d4b/?",
    "http://www.golookonline.com/r/4de6748cd6/?",
    "http://www.golookonline.com/r/4ded13f160/?",
    "http://www.golookonline.com/r/4ded681500/?",
    "http://www.golookonline.com/r/4defe352e7/?",
    "http://www.golookonline.com/r/4df1091371/?",
    "http://www.golookonline.com/r/4df2901b68/?",
    "http://www.golookonline.com/r/4df9004f55/?",
    "http://www.golookonline.com/r/4df927a94a/?",
    "http://www.golookonline.com/r/4df928399c/?",
    "http://www.golookonline.com/r/4dfbccbc5c/?",
    "http://www.golookonline.com/r/4e027abfe3/?",
    "http://www.golookonline.com/r/4e04be8801/?",
    "http://www.golookonline.com/r/4e04bf9643/?",
    "http://www.golookonline.com/r/4e04d23744/?",
    "http://www.golookonline.com/r/4e0a6a858c/?",
    "http://www.golookonline.com/r/4e0a7124a2/?",
    "http://www.golookonline.com/r/4e0a7b4a46/?",
    "http://www.golookonline.com/r/4e0b57f09f/?",
    "http://www.golookonline.com/r/4e0b5828c4/?",
    "http://www.golookonline.com/r/4e0bd1ff38/?",
    "http://www.golookonline.com/r/4e0bd282e8/?",
    "http://www.golookonline.com/r/4e13b6e446/?",
    "http://www.golookonline.com/r/4e1740e0d1/?",
    "http://www.golookonline.com/r/4e1c96ccab/?",
    "http://www.golookonline.com/r/4e248a76c9/?",
    "http://www.golookonline.com/r/4e29f22f33/?",
    "http://www.golookonline.com/r/4e2df30e97/?",
    "http://www.golookonline.com/r/4e2f0940c7/?",
    "http://www.golookonline.com/r/4e32efe209/?",
    "http://www.golookonline.com/r/4e402923be/?",
    "http://www.golookonline.com/r/4e42c55f69/?",
    "http://www.golookonline.com/r/4e43255cf2/?",
    "http://www.golookonline.com/r/4e43257d68/?",
    "http://www.golookonline.com/r/4e66dd7fef/?",
    "http://www.golookonline.com/r/4e67cbc418/?",
    "http://www.golookonline.com/r/4e67dba1af/?",
    "http://www.golookonline.com/r/4e67e471dd/?",
    "http://www.golookonline.com/r/4e68115293/?",
    "http://www.golookonline.com/r/4e6f9d054d/?",
    "http://www.golookonline.com/r/4e7299b75b/?",
    "http://www.golookonline.com/r/4e794241a7/?",
    "http://www.golookonline.com/r/4e7b576f40/?",
    "http://www.golookonline.com/r/4e7ba6e510/?",
    "http://www.golookonline.com/r/4e8519c038/?",
    "http://www.golookonline.com/r/4e851cb69d/?",
    "http://www.golookonline.com/r/4e8cdb34ed/?",
    "http://www.golookonline.com/r/4e8e33ed65/?",
    "http://www.golookonline.com/r/4e8f6d4a6b/?",
    "http://www.golookonline.com/r/4e935ab333/?",
    "http://www.golookonline.com/r/4e94d6bb16/?",
    "http://www.golookonline.com/r/4e9c6d4472/?",
    "http://www.golookonline.com/r/4e9e0a81eb/?",
    "http://www.golookonline.com/r/4e9f400566/?",
    "http://www.golookonline.com/r/4e9f40400b/?",
    "http://www.golookonline.com/r/4ea04e54c9/?",
    "http://www.golookonline.com/r/4ea1cb9a83/?",
    "http://www.golookonline.com/r/4ea749ea69/?",
    "http://www.golookonline.com/r/4ea74a1845/?",
    "http://www.golookonline.com/r/4eaee5395b/?",
    "http://www.golookonline.com/r/4eb1944aa4/?",
    "http://www.golookonline.com/r/4eb2efa967/?",
    "http://www.golookonline.com/r/4eb30efb0f/?",
    "http://www.golookonline.com/r/4eb834c11e/?",
    "http://www.golookonline.com/r/4eb977e47d/?",
    "http://www.golookonline.com/r/4ec2dcfd6c/?",
    "http://www.golookonline.com/r/4ec43269d8/?",
    "http://www.golookonline.com/r/4ec46cabdd/?",
    "http://www.golookonline.com/r/4ec5526cc7/?",
    "http://www.golookonline.com/r/4ec55983a1/?",
    "http://www.golookonline.com/r/4ec716a3b2/?",
    "http://www.golookonline.com/r/4ec716d5d7/?",
    "http://www.golookonline.com/r/4ecbf65e89/?",
    "http://www.golookonline.com/r/4ecbf6a231/?",
    "http://www.golookonline.com/r/4ecd6df0be/?",
    "http://www.golookonline.com/r/4ed527abac/?",
    "http://www.golookonline.com/r/4ed57fa944/?",
    "http://www.golookonline.com/r/4ed67bcfbc/?",
    "http://www.golookonline.com/r/4ed6cfe511/?",
    "http://www.golookonline.com/r/4ee65e8825/?",
    "http://www.golookonline.com/r/4ee65f0a66/?",
    "http://www.golookonline.com/r/4eefb8f342/?",
    "http://www.golookonline.com/r/4ef3a50469/?",
    "http://www.golookonline.com/r/4efb979f36/?",
    "http://www.golookonline.com/r/4efb9863d8/?",
    "http://www.golookonline.com/r/4efe14bdb5/?",
    "http://www.golookonline.com/r/4f0654515f/?",
    "http://www.golookonline.com/r/4f070f75b9/?",
    "http://www.golookonline.com/r/4f186c823f/?",
    "http://www.golookonline.com/r/4f186cdcce/?",
    "http://www.golookonline.com/r/4f1895b482/?",
    "http://www.golookonline.com/r/4f189f16eb/?",
    "http://www.golookonline.com/r/4f18b4afba/?",
    "http://www.golookonline.com/r/4f21f1c905/?",
    "http://www.golookonline.com/r/4f2b434a88/?",
    "http://www.golookonline.com/r/4f2b45617f/?",
    "http://www.golookonline.com/r/4f304f38a0/?",
    "http://www.golookonline.com/r/4f305a8a5c/?",
    "http://www.golookonline.com/r/4f347bc075/?",
    "http://www.golookonline.com/r/4f357a22df/?",
    "http://www.golookonline.com/r/4f398684e1/?",
    "http://www.golookonline.com/r/4f3c5fac70/?",
    "http://www.golookonline.com/r/4f3e952d12/?",
    "http://www.golookonline.com/r/4f440fbff3/?",
    "http://www.golookonline.com/r/4f4fe6e51d/?",
    "http://www.golookonline.com/r/4f554c14c9/?",
    "http://www.golookonline.com/r/4f5693ea6e/?",
    "http://www.golookonline.com/r/4f569815ca/?",
    "http://www.golookonline.com/r/4f56bcbcd9/?",
    "http://www.golookonline.com/r/4f56d627bd/?",
    "http://www.golookonline.com/r/4f56d75896/?",
    "http://www.golookonline.com/r/4f580bf885/?",
    "http://www.golookonline.com/r/4f580c3101/?",
    "http://www.golookonline.com/r/4f580ed705/?",
    "http://www.golookonline.com/r/4f580f08d4/?",
    "http://www.golookonline.com/r/4f5818db7d/?",
    "http://www.golookonline.com/r/4f59231199/?",
    "http://www.golookonline.com/r/4f592355d9/?",
    "http://www.golookonline.com/r/4f5934f606/?",
    "http://www.golookonline.com/r/4f596a754a/?",
    "http://www.golookonline.com/r/4f596aacb8/?",
    "http://www.golookonline.com/r/4f5e92124b/?",
    "http://www.golookonline.com/r/4f5f945edb/?",
    "http://www.golookonline.com/r/4f6293fc56/?",
    "http://www.golookonline.com/r/4f63b50c65/?",
    "http://www.golookonline.com/r/4f67ba93e3/?",
    "http://www.golookonline.com/r/4f68b0310c/?",
    "http://www.golookonline.com/r/4f68b0da9a/?",
    "http://www.golookonline.com/r/4f690ae475/?",
    "http://www.golookonline.com/r/4f6925f277/?",
    "http://www.golookonline.com/r/4f6b7c8124/?",
    "http://www.golookonline.com/r/4f6b9c9943/?",
    "http://www.golookonline.com/r/4f70a3e9f2/?",
    "http://www.golookonline.com/r/4f71f12d96/?",
    "http://www.golookonline.com/r/4f7646a6f0/?",
    "http://www.golookonline.com/r/4f7dd58f53/?",
    "http://www.golookonline.com/r/4f831a4295/?",
    "http://www.golookonline.com/r/4f8893c5ba/?",
    "http://www.golookonline.com/r/4f8c792db4/?",
    "http://www.golookonline.com/r/4f8cc2ede6/?",
    "http://www.golookonline.com/r/4f90a6ef80/?",
    "http://www.golookonline.com/r/4f90a7abb6/?",
    "http://www.golookonline.com/r/4f91b5826e/?",
    "http://www.golookonline.com/r/4f95a1c576/?",
    "http://www.golookonline.com/r/4f95aa408d/?",
    "http://www.golookonline.com/r/4f96fd3ea7/?",
    "http://www.golookonline.com/r/4f97175536/?",
    "http://www.golookonline.com/r/4f97386d40/?",
    "http://www.golookonline.com/r/4f9ee9a789/?",
    "http://www.golookonline.com/r/4f9f08eb50/?",
    "http://www.golookonline.com/r/4fa049e241/?",
    "http://www.golookonline.com/r/4fa06a3f8a/?",
    "http://www.golookonline.com/r/4fa1be4b40/?",
    "http://www.golookonline.com/r/4fa44077e1/?",
    "http://www.golookonline.com/r/4fa8589655/?",
    "http://www.golookonline.com/r/4fa85c42cd/?",
    "http://www.golookonline.com/r/4fa96cfc4f/?",
    "http://www.golookonline.com/r/4fa9702e1e/?",
    "http://www.golookonline.com/r/4fa975835f/?",
    "http://www.golookonline.com/r/4fa9c530e6/?",
    "http://www.golookonline.com/r/4faa99e124/?",
    "http://www.golookonline.com/r/4fac19b12c/?",
    "http://www.golookonline.com/r/4fac2db724/?",
    "http://www.golookonline.com/r/4fb5534499/?",
    "http://www.golookonline.com/r/4fb585d51f/?",
    "http://www.golookonline.com/r/4fbaa32903/?",
    "http://www.golookonline.com/r/4fbaa7fbc3/?",
    "http://www.golookonline.com/r/4fbac3202e/?",
    "http://www.golookonline.com/r/4fbd4fdeb5/?",
    "http://www.golookonline.com/r/4fbd61cb3b/?",
    "http://www.golookonline.com/r/4fbede2b92/?",
    "http://www.golookonline.com/r/4fbede6c6a/?",
    "http://www.golookonline.com/r/4fbfcf0ad6/?",
    "http://www.golookonline.com/r/4fbfe5e960/?",
    "http://www.golookonline.com/r/4fc651542a/?",
    "http://www.golookonline.com/r/4fc65510f2/?",
    "http://www.golookonline.com/r/4fc68b4714/?",
    "http://www.golookonline.com/r/4fc68d6b15/?",
    "http://www.golookonline.com/r/4fc6ac96dc/?",
    "http://www.golookonline.com/r/4fc6acc47f/?",
    "http://www.golookonline.com/r/4fc6c6412c/?",
    "http://www.golookonline.com/r/4fc7b53ba5/?",
    "http://www.golookonline.com/r/4fcd03dcf0/?",
    "http://www.golookonline.com/r/4fcd47db20/?",
    "http://www.golookonline.com/r/4fce558660/?",
    "http://www.golookonline.com/r/4fceabe93f/?",
    "http://www.golookonline.com/r/4fceb0a897/?",
    "http://www.golookonline.com/r/4fcf8c0dcb/?",
    "http://www.golookonline.com/r/4fcfd8d4ef/?",
    "http://www.golookonline.com/r/4fd0e20308/?",
    "http://www.golookonline.com/r/4fd10860c3/?",
    "http://www.golookonline.com/r/4fd235e892/?",
    "http://www.golookonline.com/r/4fd278654f/?",
    "http://www.golookonline.com/r/4fd78dbe90/?",
    "http://www.golookonline.com/r/4fd7dec10a/?",
    "http://www.golookonline.com/r/4fd9258cb2/?",
    "http://www.golookonline.com/r/4fdf6d6286/?",
    "http://www.golookonline.com/r/4fdf8ed677/?",
    "http://www.golookonline.com/r/4fdfb9dd2d/?",
    "http://www.golookonline.com/r/4fe0a4e1a0/?",
);
$contactTime = array('morning', 'afternoon', 'evening', 'anytime');
$zipcode = array('90712', '90245', '90045', '90024');
$citycode = array('los angeles', 'el segundo', 'long beach', 'santa monica');
$issue = array('Credit Score',
    'Inquiries',
    'Report Errors',
    'Collections',
    'Charge-offs',
    'Late Payments',
    'Tax Liens',
    'Judgements',
    'Repossessions',
    'Foreclosure',
    'Bankruptcy',
    'Other',);

/*
 * get a random string
 */

function rand_string($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }

    return $str;
}

/*
 * get a random element frm the array
 */

function random_element($array) {
    if (!is_array($array)) {
        return $array;
    }
    return $array[array_rand($array)];
}

date_default_timezone_set('America/Los_Angeles');
$k = array(
    'fname' => 'john',
    'lname' => 'doe',
    // 'creditissue' => random_element($issue),
    'timetocontact' => random_element($contactTime),
    'address1' => '2121 Rosecrans Ave',
    //'zip' => random_element($zipcode),
    //'city' => random_element($citycode),
    'state' => 'CA',
    'phone1' => '3104247123',
    'phone2' => '5629878657',
        //'subid' => $date,
        //'email' => rand_string(9) . "@example.com",
);


$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;


$value = array(
    requiredCapabilities => array(
        'name' => 'server_magic',
        'value' => 'mrwhite',
        'path' => '/',
        'domain' => 'www.golookonline.com'));
$cookie = json_encode($value);
 $webdriver = new WebDriver("localhost", "4444");
$webdriver->connect("firefox","",$value);

$webdriver->setSpeed('MEDIUM');


$count = 0;

$webdriver->get("http://www.golookonline.com/setcookie.html");
$env = $webdriver->findElementBy(LocatorStrategy::xpath, '//button[@value="mrwhite"]');
$env->click();
sleep(1);
setcookie('server_magic', 'mrwhite', time() + 3600, '/', 'www.golookonline');

foreach ($links as $link) {
   
    $date = date("Y-m-d-H-i-s");
    $k['creditissue'] = random_element($issue);
    $k['timetocontact'] = random_element($contactTime);
    $k['zip'] = random_element($zipcode);
    $k['city'] = random_element($citycode);
    $k['email'] = rand_string(12) . "@test.com";
    $k['subid'] = $date . "-" . rand_string(9);

    $query_string = http_build_query($k);


    echo $count . " smarturl is: " . $link . $query_string . "\n";

    $webdriver->get($link . $query_string);

    
    sleep(2);
    // if alert exist accept it.. chill out then move on
    if ($webdriver->getAlertText()) {
        $webdriver->acceptAlert();
        sleep(2);
    }
    echo "landing page: " . $webdriver->getCurrentUrl() . "\n";
    //  $webdriver->getScreenshotAndSaveToFile("d.png");
    //$form=$webdriver->findElementBy(LocatorStrategy::id,'submitbutton');

    $form = $webdriver->findElementBy(LocatorStrategy::tagName, 'button');
    $form->submit();
    sleep(2);
    /*
      $fname = $form->findElementBy(LocatorStrategy::id, 'fname');
      $fname->sendKeys(array($k['fname']));

      $lname= $form->findElementBy(LocatorStrategy::id, 'lname');
      $lname->sendKeys(array($k['lname']));

      $address1 = $form->findElementBy(LocatorStrategy::id, 'address1');
      $address1->sendKeys(array($k['address1']));

      $city = $form->findElementBy(LocatorStrategy::id, 'city');
      $city->sendKeys(array($k['city']));

      $zip = $form->findElementBy(LocatorStrategy::id, 'zip');
      $zip->sendKeys(array($k['zip']));

      $dayphone = $form->findElementBy(LocatorStrategy::id, 'phone1');
      $dayphone->sendKeys(array($k['phone1']));

      $nightphone = $form->findElementBy(LocatorStrategy::id, 'phone2');
      $nightphone->sendKeys(array($k['phone2']));

      $email = $form->findElementBy(LocatorStrategy::id, 'email');
      $email->sendKeys(array($k['email']));


      $time = $form->findActiveElement(LocatorStrategy::id, 'timetocontact');
      $time->sendKeys(array($k['timetocontact']));

      $creditissue = $form->findActiveElement(LocatorStrategy::id, 'creditissue');
      $creditissue->sendKeys(array($k['creditissue']));
     */

    //  $form->submit();

    
    try {
        $thanks = $webdriver->findElementsBy(LocatorStrategy::tagName, "span");
        $thankyou = $thanks[0]->getText();
        if ($thankyou == "Thank You!") {
            echo "Thank you page: " . $webdriver->getCurrentUrl() . "\n\n";
        }
    } catch (Exception $e) {
        echo "Error: Thank you page was not reached\n";
    }
   
    echo "-----------------------\n\n";
    $count++;
}
$webdriver->close();


$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "\n\nTest Completed in " . $totaltime . " seconds\n\n";
