<?php

use App\Actions\Materials\AdmixtureAction;
use App\Actions\Materials\AllAggregateAction;
use App\Actions\Materials\AutoclaveAeratedBlock;
use App\Actions\Materials\Bentonite;
use App\Actions\Materials\BitumenAction;
use App\Actions\Materials\BituminousMixDesignAction;
use App\Actions\Materials\BricksAction;
use App\Actions\Materials\BuildingMaterial;
use App\Actions\Materials\CementAction;
use App\Actions\Materials\CementConcreteAndMortarFreshHardenedAction;
use App\Actions\Materials\CEMENTOPCAndPPCAction;
use App\Actions\Materials\Concrete;
use App\Actions\Materials\CopperCuBaseAction;
use App\Actions\Materials\Corrossion;
use App\Actions\Materials\DrinkingWaterAction;
use App\Actions\Materials\DuplexStainlessSteelAction;
use App\Actions\Materials\FerriticStainlessSteelAction;
use App\Actions\Materials\FerrousAndNonFerrousProductAndWeldAction;
use App\Actions\Materials\FerrousNonFerrousProductBendTestAction;
use App\Actions\Materials\FerrousNonFerrousproductHardnessTestAction;
use App\Actions\Materials\FerrousNonFerrousProductTensileTestAction;
use App\Actions\Materials\FerrousNonFerrousProductWeightMeterAction;
use App\Actions\Materials\FilletWeldJointsFerrousNonFerrousProductAction;
use App\Actions\Materials\FlyAshAction;
use App\Actions\Materials\HotTensileTestAction;
use App\Actions\Materials\LowAlloySteelAction;
use App\Actions\Materials\MechanicalAction;
use App\Actions\Materials\Metal;
use App\Actions\Materials\MetalFerrousMaterial;
use App\Actions\Materials\MetalNonFerrousMaterial;
use App\Actions\Materials\Mettalography;
use App\Actions\Materials\NDT;
use App\Actions\Materials\PaverBlock;
use App\Actions\Materials\Plastic;
use App\Actions\Materials\Plywood;
use App\Actions\Materials\RockStoneCoarseAndFineAggregateAction;
use App\Actions\Materials\Rubber;
use App\Actions\Materials\Soil;
use App\Actions\Materials\SoilAction;
use App\Actions\Materials\StainlessSteelAction;
use App\Actions\Materials\StainlessSteelMetalFerrousMaterialAction;
use App\Actions\Materials\SteelAction;
use App\Actions\Materials\SteelFastnersBoltsStudAction;
use App\Actions\Materials\SteelFastnersNutAction;
use App\Actions\Materials\SteelTubeAction;
use App\Actions\Materials\SteelWireForPrestressedConcreteHTSWireAction;
use App\Actions\Materials\Tiles;
use App\Actions\Materials\TMTReinforcedSteelBarAction;
use App\Actions\Materials\WaterForConstructionPurposeAction;
use App\Actions\Materials\WeldedSteelCouponPlateAndWeldmentsAction;

return [
    1 => [
        'html' => FerrousNonFerrousProductTensileTestAction::class,
        'json' => 'app/Json/Materials/FerrousNonFerrousProductTensileTest.json',
    ],
    2 => [
        'html' => FerrousNonFerrousProductBendTestAction::class,
        'json' => 'app/Json/Materials/FerrousNonFerrousProductTensileTest.json',
    ],
    3 => [
        'html' => FerrousNonFerrousproductHardnessTestAction::class,
        'json' => 'app/Json/Materials/FerrousNonFerrousproductHardnessTest.json',
    ],
    4 => [
        'html' => FerrousNonFerrousProductWeightMeterAction::class,
        'json' => 'app/Json/Materials/FerrousNonFerrousProductWeightMeter.json',
    ],
    5 => [
        'html' => SteelTubeAction::class,
        'json' => 'app/Json/Materials/SteelTube.json',
    ],
    6 => [
        'html' => TMTReinforcedSteelBarAction::class,
        'json' => 'app/Json/Materials/TMTReinforcedSteelBar.json',
    ],
    7 => [
        'html' => MechanicalAction::class,
        'json' => 'app/Json/Materials/Mechanical.json',
    ],
    8 => [
        'html' => WeldedSteelCouponPlateAndWeldmentsAction::class,
        'json' => 'app/Json/Materials/WeldedSteelCouponPlateAndWeldments.json',
    ],
    9 => [
        'html' => FilletWeldJointsFerrousNonFerrousProductAction::class,
        'json' => 'app/Json/Materials/FilletWeldJointsFerrousNonFerrousProduct.json',
    ],
    10 => [
        'html' => SteelFastnersBoltsStudAction::class,
        'json' => 'app/Json/Materials/SteelFastnersBoltsStud.json',
    ],
    11 => [
        'html' => SteelFastnersNutAction::class,
        'json' => 'app/Json/Materials/SteelFastnersNut.json',
    ],
    12 => [
        'html' => HotTensileTestAction::class,
        'json' => 'app/Json/Materials/HotTensileTest.json',
    ],
    13 => [
        'html' => SteelWireForPrestressedConcreteHTSWireAction::class,
        'json' => 'app/Json/Materials/SteelWireForPrestressedConcreteHTSWire.json',
    ],
    14 => [
        'html' => Metal::class,
        'json' => 'app/Json/Materials/Metal.json',
    ],
    15 => [
        'html' => Plastic::class,
        'json' => 'app/Json/Materials/Plastic.json',
    ],
    16 => [
        'html' => Rubber::class,
        'json' => 'app/Json/Materials/Rubber.json',
    ],
    17 => [
        'html' => FerrousAndNonFerrousProductAndWeldAction::class,
        'json' => 'app/Json/Materials/FerrousAndNonFerrousProductAndWeld.json',
    ],
    18 => [
        'html' => Mettalography::class,
        'json' => 'app/Json/Materials/Mettalography.json',
    ],
    19 => [
        'html' => SteelAction::class,
        'json' => 'app/Json/Materials/Steel.json',
    ],
    20 => [
        'html' => StainlessSteelAction::class,
        'json' => 'app/Json/Materials/StainlessSteel.json',
    ],
    21 => [
        'html' => Corrossion::class,
        'json' => 'app/Json/Materials/Corrossion.json',
    ],
    22 => [
        'html' => FerriticStainlessSteelAction::class,
        'json' => 'app/Json/Materials/FerriticStainlessSteel.json',
    ],
    23 => [
        'html' => DuplexStainlessSteelAction::class,
        'json' => 'app/Json/Materials/DuplexStainlessSteel.json',
    ],
    24 => [
        'html' => MetalFerrousMaterial::class,
        'json' => 'app/Json/Materials/MetalFerrousMaterial.json',
    ],
    25 => [
        'html' => LowAlloySteelAction::class,
        'json' => 'app/Json/Materials/LowAlloySteel.json',
    ],
    26 => [
        'html' => StainlessSteelMetalFerrousMaterialAction::class,
        'json' => 'app/Json/Materials/StainlessSteelMetalFerrousMaterial.json',
    ],
    27 => [
        'html' => MetalNonFerrousMaterial::class,
        'json' => 'app/Json/Materials/MetalNonFerrousMaterial.json',
    ],
    28 => [
        'html' => CopperCuBaseAction::class,
        'json' => 'app/Json/Materials/CopperCuBase.json',
    ],
    29 => [
        'html' => AdmixtureAction::class,
        'json' => 'app/Json/Materials/Admixture.json',
    ],
    30 => [
        'html' => CEMENTOPCAndPPCAction::class,
        'json' => 'app/Json/Materials/CEMENTOPCAndPPC.json',
    ],
    31 => [
        'html' => FlyAshAction::class,
        'json' => 'app/Json/Materials/FlyAsh.json',
    ],
    32 => [
        'html' => RockStoneCoarseAndFineAggregateAction::class,
        'json' => 'app/Json/Materials/RockStoneCoarseAndFineAggregate.json',
    ],
    33 => [
        'html' => SoilAction::class,
        'json' => 'app/Json/Materials/SoilAction.json',
    ],
    34 => [
        'html' => DrinkingWaterAction::class,
        'json' => 'app/Json/Materials/DrinkingWater.json',
    ],
    35 => [
        'html' => WaterForConstructionPurposeAction::class,
        'json' => 'app/Json/Materials/WaterForConstructionPurpose.json',
    ],
    36 => [
        'html' => CementConcreteAndMortarFreshHardenedAction::class,
        'json' => 'app/Json/Materials/CementConcreteAndMortarFreshHardened.json',
    ],
    37 => [
        'html' => NDT::class,
        'json' => 'app/Json/Materials/NDT.json',
    ],
    38 => [
        'html' => BitumenAction::class,
        'json' => 'app/Json/Materials/Bitumen.json',
    ],
    39 => [
        'html' => BituminousMixDesignAction::class,
        'json' => 'app/Json/Materials/BituminousMixDesign.json',
    ],
    40 => [
        'html' => Concrete::class,
        'json' => 'app/Json/Materials/Concrete.json',
    ],
    41 => [
        'html' => AllAggregateAction::class,
        'json' => 'app/Json/Materials/AllAggregate.json',
    ],
    42 => [
        'html' => CementAction::class,
        'json' => 'app/Json/Materials/Cement.json',
    ],
    43 => [
        'html' => BricksAction::class,
        'json' => 'app/Json/Materials/Bricks.json',
    ],
    44 => [
        'html' => PaverBlock::class,
        'json' => 'app/Json/Materials/Concrete.json',
    ],
    46 => [
        'html' => Bentonite::class,
        'json' => 'app/Json/Materials/Bentonite.json',
    ],
    47 => [
        'html' => AutoclaveAeratedBlock::class,
        'json' => 'app/Json/Materials/AutoclaveAeratedBlock.json',
    ],
    48 => [
        'html' => Tiles::class,
        'json' => 'app/Json/Materials/Tiles.json',
    ],
    49 => [
        'html' => BuildingMaterial::class,
        'json' => 'app/Json/Materials/BuildingMaterial .json',
    ],
    50 => [
        'html' => Plywood::class,
        'json' => 'app/Json/Materials/Plywood.json',
    ],
    51 => [
        'html' => Soil::class,
        'json' => 'app/Json/Materials/Soil.json',
    ],
];
