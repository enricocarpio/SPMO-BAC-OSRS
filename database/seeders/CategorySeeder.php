<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $default_categories = 'Agricultural Chemicals,Agricultural Machinery and Equipment,Agricultural Supplies,Air Conditioning and Air Conditioning Systems,Air Conditioning Maintenance Services,Ammunitions and Explosives,Animal Feeds,Appliances,Audio and Visual Equipment,Bedclothes,Linens and Towels,Beverages,Books,Maps and Other Publications,Cargo Forwarding and Hauling Services,Catering Services,Chemical Detergents,Chemicals and Chemical Products,Communication Equipment,Communication Equipment & Parts and Accessories,Computer Furniture,Construction Equipment,Construction Management Services,Construction Materials and Supplies,Construction Projects,Corporate Giveaways,COVID-19 Response Items,Diagnostic and Laboratory Services,Drugs and Medicines,Education and Training Services,Electrical Supplies,Electrical Parts and Components,Electrical Systems and Lighting Components,Electronic Parts and Components,Engineering and Laboratory Testing Equipment,Environmental Health/Safety Equipment,Fertilizers,First Aid Kit and Medical Supplies,Fire Fighting & Rescue and Safety Equipment,Fixtures,Flags,Food Stuff,Fuels/Fuel Additives & Lubricants & Anti Corrosive,Furniture,Furniture Parts and Accessories,Garments,General Merchandise,General Repair and Maintenance Services,Grocery Items,Hardware and Construction Supplies,Hospital/Medical Equipment,Hotel and Lodging and Meeting Facilities,Industrial Pumps and Compressors,Industrial Safety Equipment,Information Technology,Information Technology Parts & Accessories & Peripherals,Internet Services,Janitorial Equipment,Janitorial Services,Janitorial Supplies,Kitchenware,Laboratory Supplies and Equipment,Laundry Services,Lease and Rental of Property or Building,Machine Tools,Mail and Cargo Transport Services,Medical Supplies and Laboratory Instrument,Metal Fabrication,Meteorological Equipment and Instruments,Motor Vehicles,Navigation Equipment,Newspapers,Office Equipment,Office Equipment Parts and Accessories,Office Equipment Supplies and Consumables,Office Supplies and Devices,Packaging Supplies and Materials,Pest Control Products,Photographic Equipment,Parts,Supplies and Accessories,Plastic Products,Power Generation and Distribution Machinery,Print and Broadcast and Aerial Advertising,Prepaid Cards,Printing Services,Printing Supplies,Purses,Handbags and Bags,Reproduction Services,Safety and Occupational Products,Security Surveillance and Detection Equipment,Services,Signage and Accessories,Surveying Instruments,Telecommunications Provider,Textiles,Token and Awards,Traffic Control Systems,Transportation and Communications Services,Travel,Food,Lodging and Entertainment Services,Vehicle Parts and Accessories,Vehicle Repair and Maintenance,Vehicles,Veterinary Products and Supplies,Water Service Connection Materials/Fittings';
        $extract_categories = explode(',',$default_categories);
        
        $extract_categories[] = 'Agricultural Products (Seeds,Seedlings,Plants..)';
        $extract_categories[] = 'Gas/ Refilling of Gas (ex. LPG,Liquid Nitrogen,etc.,)';
        $extract_categories[] = 'Live Animals (Livestock,Birds,Live Fish &,etc..)';
        
        foreach($extract_categories as $k => $value) 
        {
            Category::create(['category_name'=>$value]);
        }
    
    }
}
