#include <iostream>
#include <iomanip>
#include <limits>
#include <stdio.h>
#include <string.h>
#include <fstream>
#include <string>
using namespace std;
#define MAX_TABLES 25

string int_to_string(int num) {
    string result = "";
    while (num > 0) {
        result = char(num % 10 + '0') + result;
        num /= 10;
    }
    return result;
}


void decore()
{
    cout<<"=================================================================="<<endl;
}
void subdecore()
{
    cout<<"------------------------------------------------------------------"<<endl;
}


/*####################################################################################################
    Customer_class
  ####################################################################################################
*/

class Customer {
    private:
    int Active;
    public:
    string Cust_Name;
    string Password;
    int Table_ID;
    Customer(){
        Active = 0;
        Cust_Name = "";
        Password = "";
        Table_ID = -1;
    }  
    bool Is_Active(){
        switch (Active)
        {
        case 1:
            return true;
            break;
        
        case 0:
            return false;
            break;
        }
        return false;
    }
    void set_Active(bool act){
        Active = act;
    }
};

/*####################################################################################################
    BASEFOOD CLASS
  ####################################################################################################
*/

class basefood {
    public:
    //all Public modifiers that is universal for coding
    int quantity;//Just_states the quentity of the food_item
    string food_name;//the name of the food
    float price;//price
    int food_ID;//simple ID I'm planning to detect custom foods using these
    //base constucter, for any new variables you made, initilize a nuetral value like 0 or 1 
    basefood() {
        food_ID = 0;
        food_name = "";
        quantity = 1;
        price = 0.0;
    }
    //assign Information for the order_list
    basefood(string name,int Quinty, float Pric){
        food_ID = 1;
        food_name = name;
        quantity = Quinty;
        price = Pric;
    }
    //might be usless but here just in case
    void set_food_Id(int id){
        food_ID = id;
    }
    //also might be useless but again, just in case
    int get_food_id() {
        return food_ID;
    }

    //virtual functions are function universal with derived classes, needs to redifine them in the derived class
    //can be used by a pointer to the base class that holds the address of the derived class
    virtual void set_custom_price(){};
    virtual void set_price(float p){
        price = p;
    }
    virtual void description(){};
    friend class order_list;
};

//giant comment boxes to allow easier traversal of the code
//##############################################################################################
//  WATER CLASSES
//##############################################################################################


 class Drinks : public basefood {
    public:
    //an example of needed addition for a class
    //most foods don't need diffirent prices, but drinks often do
    float size_prices[3];
    Drinks() : basefood() {
        for(int i = 0;i<3;i++){
            size_prices[i] = 0;
        }
    }
    void set_price_variation(float prices[3]){
        for(int i = 0; i < 3; i++){
            size_prices[i] = prices[i];
        }
        price = size_prices[0];
    }

    void choose_price(int a){
        try
        {
            if(size_prices[a] > 1){
                price = size_prices[a];
            }
            else{
                cout<<"That price is 0";
            }
        }
        catch(const std::exception& e)
        {
            std::cerr << e.what() << '\n';
            cout<<"Size over allowed";
        }
        
    }
};



class Juice : public Drinks{
    public:
    Juice() : Drinks(){}
};

class softDrinks : public Drinks{
    public:
    softDrinks() : Drinks(){}
};

//##############################################################################################
//  MISC CLASSES
//##############################################################################################


class Sides : public basefood{
    public:
    Sides() : basefood(){}
};

class Dessert : public basefood{
     public:
    //an example of needed addition for a class
    //most foods don't need diffirent prices, but drinks often do
    float size_prices[2];
    Dessert() : basefood() {
        for(int i = 0;i<2;i++){
            size_prices[i] = 0;
        }
    }
    void set_price_variation(float prices[2]){
        for(int i = 0; i < 2; i++){
            size_prices[i] = prices[i];
        }
        price = size_prices[0];
    }

    void choose_price(int a){
        try
        {
            if(size_prices[a] > 1){
                price = size_prices[a];
            }
            else{
                cout<<"That price is 0";
            }
        }
        catch(const std::exception& e)
        {
            std::cerr << e.what() << '\n';
            cout<<"Size over allowed";
        } 
    }
};



class Mainfood : public basefood {
public:
    bool chili_sauce;

    Mainfood() : basefood() {
        chili_sauce = false;
    }
};

//##############################################################################################
//      FRIEND CLASSES OF BASEFOOD
//##############################################################################################




//##############################################################################################
//      OTHERS
//##############################################################################################

class order_list{
    public:
    string *food_name;
    int *quantity;
    float *price;
    float Total_prices;
    int size;   
    order_list(){
        food_name = new string[1];
        price = new float[1];
        quantity = new int[1];
        size = 0;
    }
    void add_item(basefood food,int Q){
        string *temp_name_arr;
        int *temp_q_arr;
        float *temp_price_arr;
        if(size == 0){
            food_name[0] = food.food_name;
            price[0] = food.price;
            quantity[0] = Q;
            size++;
            return;
        }
        temp_name_arr = new string[size];
        temp_q_arr = new int[size];
        temp_price_arr = new float[size];
        for(int i = 0;i < size;i++){
            temp_name_arr[i] = food_name[i];
            temp_price_arr[i] = price[i];
            temp_q_arr[i] = quantity[i];
        }
        delete[] food_name;
        delete[] price;
        delete[] quantity;
        food_name = new string[size+1];
        price = new float[size+1];
        quantity = new int[size+1];
        food_name[size] = food.food_name;
        price[size] = food.price * Q;
        quantity[size] = Q;
        for(int i = (size-1);i >= 0;i--){
            food_name[i] = temp_name_arr[i];
            price[i] = temp_price_arr[i];
            quantity[i] = temp_q_arr[i];
        }
        size++;
        delete[] temp_name_arr;
        delete[] temp_price_arr;
        delete[] temp_q_arr;
    }
    void Clear_Order_List(){
        delete[] food_name;
        delete[] price;
        delete[] quantity;
        food_name = new string[1];
        price = new float[1];
        quantity = new int[1];
        size = 0;
    }
};

bool table[MAX_TABLES] = {0};

int main_table = -1;
int current_cust = 0;
Customer cust[MAX_TABLES];
order_list order[MAX_TABLES];
Mainfood mainfood[20];
Sides side[20];
Dessert dessert[20];
Drinks drink[20];
Juice juice[20];
softDrinks softdrink[20];

//##############################################################################################
//      LOADERS
//##############################################################################################

//loaders are required to use FILE, loading things from customer ID, foods and Tables.
//using an overloaded function we can use the same name "load" for all loading processes
//primarily uses C systex for FILE because C++ FILE can only load String
void load(Juice Juice[],int Repeat){
    //first step is to identify the variable you need to inilize from the claas
    //in this case, I must account for drinks and Juice variables
    //Once you find it, make a FILE.txt with a releted name, and format a the data
    //to match all the needed variables.
    int id;
    char name[30];
    float prices[3];
    FILE *fp;
    fp = fopen("juice_catagory_Info.txt","r");
    if(fp == NULL){
        cout<<"error file not loaded";
        return;
    }
    //this loader is equiped to deal with arrays of Juice, using this, we can specify the amount
    //to load
    for(int i = 0;i<Repeat;i++){
        if(fscanf(fp,"%d",&id) == 1){}
        else{
            cout<<"load end reached"<<endl;
            return;}
        Juice[i].set_food_Id(id);
        //string stopper method, use a / to attech strings together without underscore"_"
        fscanf(fp,"%s",name);
        while(name[0]!='/'){
            Juice[i].food_name += name;
            Juice[i].food_name += " ";
            fscanf(fp,"%s",name);
        }
        fscanf(fp,"%f %f %f",&prices[0],&prices[1],&prices[2]);
        Juice[i].set_price_variation(prices);
    }
    fclose(fp);
    return;
}


void load(Drinks drink[],int Repeat){
    int active;
    char name[30];
    float prices[3];
    FILE *fp;
    fp = fopen("Drinks_catagory.txt","r");
    if(fp == NULL){
        cout<<"error file not loaded";
        return;
    }
    for(int i = 0;i<Repeat;i++){
        if(fscanf(fp,"%d",&active) == 1){}
        else{
            cout<<"load end reached"<<endl;
            return;}
        
        drink[i].set_food_Id(active);
        fscanf(fp,"%s",name);
        while(name[0]!='/'){
            drink[i].food_name += name;
            drink[i].food_name += " ";
            fscanf(fp,"%s",name);
        }

        fscanf(fp,"%f %f %f",&prices[0],&prices[1],&prices[2]);
        drink[i].set_price_variation(prices);
    }
    fclose(fp);
    return;
}

void load(softDrinks Sdrink[],int Repeat){
    int active;
    char name[30];
    float prices[3];
    FILE *fp;
    fp = fopen("SoftDrinks_catagory.txt","r");
    if(fp == NULL){
        cout<<"error file not loaded";
        return;
    }
    for(int i = 0;i<Repeat;i++){
        if(fscanf(fp,"%d",&active) == 1){}
        else{
            cout<<"load end reached"<<endl;
            return;}
        
        Sdrink[i].set_food_Id(active);
        fscanf(fp,"%s",name);
        while(name[0]!='/'){
            Sdrink[i].food_name += name;
            Sdrink[i].food_name += " ";
            fscanf(fp,"%s",name);
        }

        fscanf(fp,"%f %f %f",&prices[0],&prices[1],&prices[2]);
        Sdrink[i].set_price_variation(prices);
    }
    fclose(fp);
}

void load(Mainfood mainfood[], int Repeat){
    int id;
    char name[30];
    float price;
    char chili[10];
    FILE *fp = fopen("Mainfood_catagory.txt", "r");
    if(fp == NULL){
        cout << "Error: mainfood file not loaded" << endl;
        return;
    }

    for(int i = 0; i < Repeat; i++){
        if(fscanf(fp, "%d", &id) != 1){
            cout << "Load end reached" << endl;
            break;
        }

        mainfood[i].set_food_Id(id);
        mainfood[i].food_name = "";

        fscanf(fp, "%s", name);
        while(name[0] != '/'){
            mainfood[i].food_name += name;
            mainfood[i].food_name += " ";
            fscanf(fp, "%s", name);
        }

        fscanf(fp, "%f %s", &price, chili);
        mainfood[i].price = price;
        mainfood[i].chili_sauce = (strcmp(chili, "true") == 0);
    }

    fclose(fp);
}

void load(Sides side[], int Repeat){
    int active;
    char name[30];
    float price;
    FILE *fp;
    fp = fopen("Sides_catagory.txt","r");
    if(fp == NULL){
        cout<<"error file not loaded";
        return;
    }
    for(int i = 0;i<Repeat;i++){
        if(fscanf(fp,"%d",&active) == 1){}
        else{
            cout<<"load end reached"<<endl;
            return;}
        
        side[i].set_food_Id(active);
        fscanf(fp,"%s",name);
        while(name[0]!='/'){
            side[i].food_name += name;
            side[i].food_name += " ";
            fscanf(fp,"%s",name);
        }

        fscanf(fp,"%f",&price);
        side[i].price = price;
    }
    fclose(fp);
    return;
}

void load(Dessert Food[],int Repeat){
    int active;
    char name[30];
    float prices[2];
    FILE *fp;
    fp = fopen("Sides_catagory.txt","r");
    if(fp == NULL){
        cout<<"error file not loaded";
        return;
    }
    for(int i = 0;i<Repeat;i++){
        if(fscanf(fp,"%d",&active) == 1){}
        else{
            cout<<"load end reached"<<endl;
            return;}
        
        Food[i].set_food_Id(active);
        fscanf(fp,"%s",name);
        while(name[0]!='/'){
            Food[i].food_name += name;
            Food[i].food_name += " ";
            fscanf(fp,"%s",name);
        }

        fscanf(fp,"%f %f",&prices[0],&prices[1]);
        Food[i].price = prices[0];
    }
    fclose(fp);
    return;
}





void load(Customer cust[]){
    int Active;
    int i = 0;
    char temp_str[30] = "";
    int Table_ID;
    FILE *fp;
    fp = fopen("Customer.txt","r");
    fscanf(fp,"%d",&Active);
    while(Active == 1)
    {
        current_cust++;
        cout<<"loading";
        cust[i].set_Active(true);
        fscanf(fp,"%s",temp_str);
        while(temp_str[0] != '/'){
            cust[i].Cust_Name += temp_str;
            fscanf(fp,"%s",temp_str);
            if(temp_str[0]!='/'){
                cust[i].Cust_Name += " ";
            }
            }
        fscanf(fp,"%s",temp_str);
        while(temp_str[0] != '/')
            {
            cust[i].Password += temp_str;
            fscanf(fp,"%s",temp_str);
            if(temp_str[0] != '/'){
                cust[i].Password += " ";
            }
            }
        fscanf(fp,"%d",&Table_ID);
        cust[i].Table_ID = Table_ID;
        table[Table_ID] = true;
        cout<<cust[i].Table_ID;
        i++;
        fscanf(fp,"%d",&Active);
    }
    fclose(fp);
    return;
}


void load(order_list order[],int Repeat){
    int size;
    char name[30] = "";
    string main_name = "";
    int quantity;
    float price;
    basefood *food;

    FILE *fp;
    fp = fopen("order_list.txt","r");
    for(int i = 0;i < Repeat;i++){
        fscanf(fp,"%d",&size);
        for(int j = 0;j < size;j++){
            main_name = "";
            fscanf(fp,"%s",name);
            while(name[0]!='/'){
                main_name += name;
                main_name += " ";
                fscanf(fp,"%s",name);
            }
            fscanf(fp,"%d %f",&quantity,&price);
            food = new basefood(main_name,quantity,price);
            order[i].add_item(*food,1);
        }
    }
}
//##############################################################################################
//      SAVERS
//##############################################################################################
//savers have the same concept for louders but in reverse
//because the C++ is capible of writing into FILE with the "<<" operator with any value type
//C++ FILE is prefered to save because it's easier to write

void save(Customer cust[],int Repeat){
    ofstream outfile("Customer_test.txt");
    int i=0,cap = Repeat;
    if(outfile.is_open()){
        while (Repeat > 0 && i < cap)
        {
            if(cust[i].Is_Active() == true){
                Repeat--;
                outfile<<"1 ";
                outfile<<cust[i].Cust_Name<<" / ";
                outfile<<cust[i].Password<<" / ";
                outfile<<cust[i].Table_ID<<" "<<endl;
            }
            i++;
        }
        while(Repeat > 0){
            Repeat--;
            outfile<<"0"<<endl;
        }
        outfile.close();
    }
}

void save(order_list order[],int Repeat){
    ofstream outfile("Order_List_Test.txt");
    int i,size;
    if(outfile.is_open()){
        while (i < Repeat)
        {
            size = order[i].size;
            outfile<<size<<endl;
            for(int j = 0;j < size;j++){
                outfile<<order[i].food_name<<"/ ";
                outfile<<order[i].quantity<<" ";
                outfile<<order[i].price<<endl;
            }
            i++;
        }
        
    }
}



//#############################################################################
//  DISPLAY
//#############################################################################
//Display function, works on a similer method to the load and save but more controlled for it's class
//all display functions are the same name that takes a diffirent class to identify which display works
int display(Juice juice[],int Repeat){
    //setup, display the Catagory and set the precision of cout for the prices
    cout<<"==============================JUICE==============================="<<fixed<<setprecision(2)<<endl;
    int i;
    for(i = 0;i < Repeat;i++){
        //food check, check if Food_ID is = to 0, in which it will end the display
        if(juice[i].food_ID == 0){break;}
        //format the display text
        cout<<left<<setw(3)<<i+1<<". "<<setw(35)<<juice[i].food_name<<endl;
        cout<<"Sizes : "<<endl;
        for(int j = 0;j<3;j++){
            if(juice[i].size_prices[j]>=0.1){
                cout<<right<<setw(50)<<"RM";
                cout<<setw(6)<<fixed<<setprecision(2)<<juice[i].size_prices[j]<<endl;
            }
        }
        cout<<endl;
        subdecore();
      }
      return i-1;
}

int display(Drinks drink[],int Repeat){
    cout<<"==============================DRINKS=============================="<<fixed<<setprecision(2)<<endl;
    int i;
    for(i = 0;i < Repeat;i++){
        if(drink[i].food_ID == 0){break;}
        cout<<left<<setw(3)<<int_to_string(i+1)+". "<<setw(35)<<drink[i].food_name<<endl;
        cout<<"Sizes : "<<endl;
        for(int j = 0;j < 3;j++){
            if(drink[i].size_prices[j]>=0.1){
                cout<<right<<setw(50)<<"RM";
                cout<<setw(6)<<fixed<<setprecision(2)<<drink[i].size_prices[j]<<endl;
            }
        }
        subdecore();
    }
    return i-1;
}

int display(softDrinks drink[],int Repeat){
    cout<<"==============================SOFTDRINKS=============================="<<fixed<<setprecision(2)<<endl;
    int i;
    for(i = 0;i < Repeat;i++){
        if(drink[i].food_ID == 0){break;}
        cout<<left<<setw(3)<<int_to_string(i+1)+". "<<setw(35)<<drink[i].food_name<<endl;
        cout<<"Sizes : "<<endl;
        for(int j = 0;j < 3;j++){
            if(drink[i].size_prices[j]>=0.1){
                cout<<right<<setw(50)<<"RM";
                cout<<setw(6)<<fixed<<setprecision(2)<<drink[i].size_prices[j]<<endl;
            }
        }
        subdecore();
        }
    return i-1;
}

int display(order_list order){
    cout<<"============================ORDER LIST============================"<<fixed<<setprecision(2)<<endl;
    for(int i = 0;i < order.size;i++){
        cout<<"---"<<(i+1)<<"---"<<endl;
        cout<<order.food_name[i]<<endl;
        cout<<"Q "<<order.quantity[i]<<endl;
        cout<<"Price: "<<(order.price[i]*order.quantity[i])<<endl;
    }
    subdecore();
}

//MAINFOOD DISPLAY
int display(Mainfood mainfood[], int Repeat){
    cout << "=============================MAIN FOOD============================" << fixed << setprecision(2) << endl;
    int i;
    for(i = 0; i < Repeat; i++){
        if(mainfood[i].food_ID == 0) break;

        cout << left << setw(3) << int_to_string(i+1) + ". " << setw(35) << mainfood[i].food_name;
        cout << right << setw(10) << "RM " << setw(6) << mainfood[i].price;

        if(mainfood[i].chili_sauce) cout << " +Chili";

        cout << endl;
        subdecore();
    }
    return i-1;
}

int display(Sides mainfood[], int Repeat){
    cout << "=============================SIDES============================" << fixed << setprecision(2) << endl;
    int i;
    for(i = 0; i < Repeat; i++){
        if(mainfood[i].food_ID == 0) break;

        cout << left << setw(3) << int_to_string(i+1) + ". " << setw(35) << mainfood[i].food_name;
        cout << right << setw(10) << "RM " << setw(6) << mainfood[i].price;

        cout << endl;
    }
    subdecore();
    return i-1;
}

int display(Dessert dessert[],int Repeat){
    cout<<"==============================DESSERT=============================="<<fixed<<setprecision(2)<<endl;
    int i;
    for(int i = 0;i < Repeat;i++){
        if(dessert[i].food_ID == 0){break;}
        cout<<left<<setw(3)<<int_to_string(i+1)+". "<<setw(35)<<dessert[i].food_name<<endl;
        cout<<"Sizes : "<<endl;
        for(int j = 0;j < 2;j++){
            if(dessert[i].size_prices[j]>=0.1){
                cout<<right<<setw(50)<<"RM";
                cout<<setw(6)<<fixed<<setprecision(2)<<dessert[i].size_prices[j]<<endl;
            }
        }
        subdecore();   
    }
    return i-1;
}


//Customer_List
int display(Customer Cust[],int Repeat){
    cout<<"=============================Customers============================" << fixed << setprecision(2) << endl;
    for(int i = 0; i < Repeat; i++){
        if(Cust[i].Is_Active() == false) break;

        cout << left << setw(3) << int_to_string(i+1) + ". \t" << Cust[i].Cust_Name;
        cout << endl;
    }
    subdecore();
}





void Bill(int TN, order_list order) 
{
    int I_total = order.size;
    float TP_per_food,Tax=0, PTT=0,FTP=0;

    cout<<"===============================Bill==============================="<<endl;
    cout<<"Table No. "<<TN+1<<endl;

    subdecore();

    cout<<left;
    cout<<setw(3)<<""<<setw(35)<<"Food Name"<<setw(15)<<"Quantity";
    cout<<right<<setw(12)<<"Price\n\n";
    for(int i = 0; i < I_total; i++)
    {

        TP_per_food = order.price[i] * order.quantity[i];
        PTT += TP_per_food;
        cout<<left;
        cout<<setw(3)<<int_to_string(i+1)+". "<<setw(35)<<order.food_name[i]<<setw(15)<<"("+int_to_string(order.quantity[i])+")"<<setw(4)<<"RM ";
        cout<<right<<setw(6)<<fixed<<setprecision(2)<<TP_per_food<<endl;

    } // continues looping untill everything is printed out

    subdecore();

    Tax = PTT * 0.06;

    cout<<left;
    cout<<setw(3)<<""<<setw(50)<<"Gov Tax (6%)"<<"RM ";
    cout<<right<<setw(7)<<fixed<<setprecision(2)<<Tax<<endl;

    decore();

    FTP = PTT + Tax;

    cout<<left;
    cout<<setw(3)<<""<<setw(50)<<"Total"<<"RM ";
    cout<<right<<setw(7)<<fixed<<setprecision(2)<<FTP<<endl;

    decore();

}




//#####################################################################################################
//  MAIN MENU
//#####################################################################################################

class PreMenu {
private:
    int option;
public:
    void showMenu() {
        // Keeps asking until valid input is given
        while(true) {
            cout << "\n=================== KELANG-KABUT RESTAURANT ====================\n";
            cout <<left<<setw(50)<<"New Customer"<<right<<setw(16)<<"1\n";
            cout <<left<<setw(50)<<"Seated Customer"<<right<<setw(16)<<"2\n";
            cout <<left<<setw(50)<<"Exit"<<right<<setw(16)<<"0\n";
            subdecore();
            cout <<left<<setw(50)<<"\nEnter 1 or 2 for customer or 0 to exit : "<<endl;

            // If input fails (e.g., user entered letters), then...
            if(!(cin >> option)) { 
                cin.clear(); // Reset error flags
                cin.ignore(numeric_limits<streamsize>::max(), '\n'); // Ignore as many characters as needed until the newline char
                subdecore();
                cerr << "Error: Invalid input! Please enter a number.\n"; // Display an error message
                continue; // Skips the rest of the loop and asks again
            }
            
            if(option == 0 || option == 1 || option == 2) {
                break; // Exits the loop if input is valid
            } else {
                subdecore();
                cerr << "Error: Number entered is incorrect!\n";
                cout << "Please enter either 1 for new customer, 2 for seated customer, or 0 to exit.\n";
            }
        }
        cout << "\n";
    }
    int getOption() const { return option; } // Note: Set to const so that it can't be accidentally modified
};

class CustomerMenu {
public:
    // Show available tables
    void tablesAvailable() const {
        int availableTables = 0;
        cout << "\n=========================AVAILABLE TABLES=========================\n\n";
        cout << "Green\t= Available\n";
        cout << "Red\t= Occupied\n";
        decore();
        
        for(int i = 0; i < 25; i++) {
            if(!table[i]) {
                // Green background for available tables
                cout << "\033[1;42m" << "[" << setw(2) << setfill('0') << i + 1 << "]" << "\033[0m ";
                availableTables++;
            } else {
                // Red background for occupied tables
                cout << "\033[1;41m" << "[" << setw(2) << setfill('0') << i + 1 << "]" << "\033[0m ";
            }
            
            if((i + 1) % 5 == 0) { cout << "\n"; }
        }
        
        if(availableTables == 0) {
            cout << "\nThere are no available tables.";
        }

        cout << "\n";
    }

    void selectTable() {
        int picked;

        // Display current table availability
        tablesAvailable();

        // Keep asking until valid input is received
        while(true) {
            subdecore();
            cout << "Select a table (1-20), (0 to cancel) : ";
            
            // Check if input operation failed (e.g., user entered letters)
            if(!(cin >> picked)) {
                cin.clear();  // Reset error flags
                cin.ignore(numeric_limits<streamsize>::max(), '\n');  // Discard bad input
                cerr << "Invalid input! Please enter a number.\n\n";
                continue;  // Restart the loop
            }
            
            // Allow user to cancel selection
            if(picked == 0) {
                cout << "\n";
                return;  // Exit function if user chooses 0
            }
            
            
            // Validate table number range
            if(picked < 1 || picked > 25) {
                cerr << "Error: Table number must be between 1 and 20\n\n";
                continue;  // Restart the loop
            }
            
            // Check if table is already occupied
            if(table[picked - 1]) {  // Note: -1 converts to 0-based index
                cerr << "Error : Table " << picked << " is already occupied\n\n";
                continue;  // Restart the loop
            }
            
            // If all checks passed, exit the loop
            break;
        }
        
        // Universal index
        main_table = picked - 1;
        
        // Mark the selected table as occupied
        table[main_table] = true;  // -1 converts to 0-based index

        // Confirm selection to user
        cout << "Table " << picked << " selected!\n" << endl;

        cout << "Enter your name: ";
        cin.ignore();
        getline(cin, cust[current_cust].Cust_Name);
        cout << "Set password: ";
        getline(cin, cust[current_cust].Password);
        cust[current_cust].Table_ID = main_table+1;
        
        cout << "\nName & password entered!\n";
        cout << "Your name: " << cust[current_cust].Cust_Name << "\n";
        cout << "Your password: " << cust[current_cust].Password << "\n";
        cout << "Your table number: " << cust[current_cust].Table_ID << "\n\n";
    }

    // Option for customer to leave restaurant and clear table
    void custLeave() {
        char YN;
        
        while(true) {
            cout << "Are you sure? [Y/N]\n";
            cin >> YN;

            // Changes input to upper case letter
            YN = toupper(YN);

            // Error handling for invalid input
            if(YN != 'Y' && YN != 'N') {
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cerr << "\nError: Invalid input. Enter Y or N only.\n\n";
                continue;
            }

            // Clears the input buffer (avoids extra characters e.g. If input is "Yes", 
            // YN takes 'Y', but "es" remains in the buffer and may cause issues later.)
            cin.ignore(numeric_limits<streamsize>::max(), '\n');

            if (YN == 'N') {
                cout << "Operation cancelled.\n";
                return; // Exit function if customer stays
            }
            break; // Proceed if 'Y'
        }

        // Mark the table at the moment as available (occoupied --> available)
        table[main_table] = false;
<<<<<<< Updated upstream
        
        save(cust,MAX_TABLES);
=======
        cust[current_cust].set_Active(false);

>>>>>>> Stashed changes
        cout << "Goodbye customer!\n";
    }

    // For seated customer to go back to their table and edit (e.g. add order, look at bill, leave restaurant)
    void editTable() {
        int cust_id;
        string password;
        
        // Password authentication
        while(true) {
            cout << "Choose number: ";

            // Error handling if input is char
            if(!(cin >> cust_id)) {
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cerr << "\nError: Invalid input! Enter numbers only.\n\n";
                continue;
            }
            
            cust_id--; // Decrement by 1 to be same as table index
            if(cust_id >= current_cust || cust_id < 0){
                cout<<"Invalid pick again\n";
                continue;
            }
            else{
                cout<<"please enter password:";
                cin>>password;
                if(password != cust[cust_id].Password){
                    cout<<"Password incorrect pick again";
                    continue;
                }
                else{
                    current_cust = cust_id;
                    main_table = cust[current_cust].Table_ID;
                    cout<<"Welcome back";
                    break;
                }
            }
        }

        menuOption(); // Go to current customer's table after password is verified
    }

    void foodMenu() {
        int foodCate;
        int choice;
        int food_size;
        int Q;
        basefood *food;
        
        cout << "\n=========================FOOD CATEGORIES==========================\n";
        cout <<left<<setw(50)<<setfill(' ')<<"Main Food"<<right<<setw(16)<<"1\n";
        cout <<left<<setw(50)<<"Soft Drinks"<<right<<setw(16)<<"2\n";
        cout <<left<<setw(50)<<"Desserts"<<right<<setw(16)<<"3\n";
        cout <<left<<setw(50)<<"Sides"<<right<<setw(16)<<"4\n";
        cout <<left<<setw(50)<<"Drinks"<<right<<setw(16)<<"5\n";
        cout <<left<<setw(50)<<"Juice"<<right<<setw(16)<<"6\n";
        cout <<left<<setw(50)<<"Exit"<<right<<setw(16)<<"0\n";
        subdecore();

        while(true) {
            cout << left << setw(50) << "Choose a food category (0 to exit): ";

            // Error handling
            if(!(cin >> foodCate)) {
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cerr << "Invalid input! Please enter a number.\n\n";
                continue;
            }

            if(foodCate > 0 && foodCate <= 6){
                switch (foodCate) {
                case 1: 
                    food_size = display(mainfood,20);
                    cout<<"choose option:";
                    
                    while(true) {
                        if(!(cin >> choice)) {
                            cin.clear();
                            cin.ignore(numeric_limits<streamsize>::max(), '\n');
                            cerr << "Invalid input! Please enter a number.\n\n";
                            continue;
                        }

                        if(choice-1 >= 0 && choice-1 <= food_size){
                            food = new basefood(mainfood[choice-1].food_name,mainfood[choice-1].quantity,mainfood[choice-1].price);
                            cout<<"quantity:";
                            cin>>Q; 
                            order[main_table].add_item(*food,Q);
                            break;
                        }
                    }
                    break;
                case 2:
                    food_size = display(softdrink,20);
                    cout<<"choose option:";
                    
                    while(true) {
                        if(!(cin >> choice)) {
                            cin.clear();
                            cin.ignore(numeric_limits<streamsize>::max(), '\n');
                            cerr << "Invalid input! Please enter a number.\n\n";
                            continue;
                        }
                    
                        if(choice-1 >= 0 && choice-1 <= food_size){
                            cout<<"Price:";
                            cin>>Q;
                            softdrink[choice-1].choose_price(Q);
                            food = new basefood(softdrink[choice-1].food_name,softdrink[choice-1].quantity,softdrink[choice-1].price);
                            cout<<"quantity:";
                            cin>>Q; 
                            order[main_table].add_item(*food,Q);
                            break;
                        }
                    } 
                    break;
                case 3:
                    food_size = display(dessert,20);
                    cout<<"choose option:";

                    while(true) {
                        if(!(cin >> choice)) {
                            cin.clear();
                            cin.ignore(numeric_limits<streamsize>::max(), '\n');
                            cerr << "Invalid input! Please enter a number.\n\n";
                            continue;
                        }

                        if(choice-1 >= 0 && choice-1 <= food_size){
                            cout<<"Price:";
                            cin>>Q;
                            dessert[choice-1].choose_price(Q);
                            food = new basefood(dessert[choice-1].food_name,dessert[choice-1].quantity,dessert[choice-1].price);
                            cout<<"quantity:";
                            cin>>Q; 
                            order[main_table].add_item(*food,Q);
                            break;
                        }
                    }
                    break;
                case 4: 
                    food_size = display(side,20);
                    cout<<"choose option:";
                    
                    while(true) {
                        if(!(cin >> choice)) {
                            cin.clear();
                            cin.ignore(numeric_limits<streamsize>::max(), '\n');
                            cerr << "Invalid input! Please enter a number.\n\n";
                            continue;
                        }
                        
                        if(choice-1 >= 0 && choice-1 <= food_size){
                            food = new basefood(side[choice-1].food_name,side[choice-1].quantity,side[choice-1].price);
                            cout<<"quantity:";
                            cin>>Q; 
                            order[main_table].add_item(*food,Q);
                            break;
                        }
                    }
                    break;
                case 5: 
                    food_size = display(drink,20);
                    cout<<"choose option:";

                    while(true) {
                        if(!(cin >> choice)) {
                            cin.clear();
                            cin.ignore(numeric_limits<streamsize>::max(), '\n');
                            cerr << "Invalid input! Please enter a number.\n\n";
                            continue;
                        }

                        if(choice-1 >= 0 && choice-1 <= food_size){
                            cout<<"Price:";
                            cin>>Q;
                            drink[choice-1].choose_price(Q);
                            food = new basefood(drink[choice-1].food_name,drink[choice-1].quantity,drink[choice-1].price);
                            cout<<"quantity:";
                            cin>>Q; 
                            order[main_table].add_item(*food,Q);
                            break;
                        }
                    }
                    break;
                case 6:
                    food_size = display(juice,20);
                    cout<<"choose option:";
                    
                    while(true) {
                    if(!(cin >> choice)) {
                        cin.clear();
                        cin.ignore(numeric_limits<streamsize>::max(), '\n');
                        cerr << "Invalid input! Please enter a number.\n\n";
                        continue;
                    }
                    
                    if(choice-1 >= 0 && choice-1 <= food_size){
                        
                        cout<<"Price:";
                        cin>>Q;
                        juice[choice-1].choose_price(Q);
                        food = new basefood(juice[choice-1].food_name,juice[choice-1].quantity,juice[choice-1].price);
                        cout<<"quantity:";
                        cin>>Q; 
                        order[main_table].add_item(*food,Q);
                        break;
                    }
                    save(order,MAX_TABLES);
                }
                break;
                case 0: return; // Returns to customer menu
                default: 
                    cerr << "\nError: Invalid input! Select given options only.\n\n";
                }
        
            }
        }
    }

    // After Table is selected for new customer
    void menuOption() {
        while(true) {
            cout << "==========================CUSTOMER MENU===========================\n";

            cout <<left<<setw(50)<<setfill(' ')<<"Food Menu"<<right<<setw(16)<<"1\n";
            cout <<left<<setw(50)<<"View Bill"<<right<<setw(16)<<"2\n";
            cout <<left<<setw(50)<<"Leave Restaurant"<<right<<setw(16)<<"3\n";
            cout <<left<<setw(50)<<"Exit"<<right<<setw(16)<<"0\n";
            subdecore();
            cout <<left;
 
            int option;
            cout << "\nOption: ";

            // Error handling
            if(!(cin >> option)) {
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cerr << "Invalid input! Please enter a number.\n\n";
                continue;
            }
            cout << "\n";

            switch(option) {
                case 1: foodMenu(); break;
                case 2: Bill(main_table+1,order[main_table]); break;
                case 3: custLeave(); break;
                case 0: 
                    save(cust,MAX_TABLES);
                    return;
                default: cerr << "Enter the given options only!\n\n";
            }
        }
    }

    // New Customer 
    void runNewCust() {
        selectTable();
        save(cust,MAX_TABLES);
        menuOption();

    }

    // Seated Customer 
    void runSeatedCust() {
        display(cust, MAX_TABLES);
        editTable();
        
    }

    
};



int main() {
    load(cust);
    load(mainfood,20);
    load(side,20);
    load(dessert,20);
    load(drink,20);
    load(juice,20);
    load(softdrink,20);
    cout<<"new customer"<<current_cust;
    PreMenu PM;
    CustomerMenu CM;
    PM.showMenu();
    int option = PM.getOption();

    // To exit program
    if(option == 0) {
        cout << "Goodbye!" << endl;
        return 0;
    }

    // For new customers
    if(option == 1){
        CM.runNewCust();
    }

    // For seated customers
    if(option == 2){
        CM.runSeatedCust();
    }
}