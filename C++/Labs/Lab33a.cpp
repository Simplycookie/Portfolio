#include<iostream>
#include<iomanip>
#include<string.h>
using namespace std;
class Purchase{
    char name[30], code[4];
    int qty;
    float price, total, convertf;
    public:
    void set_char(char choice[],char replace[]){
        if(strcmp(choice,"name")==0){strcpy(name,replace);}
        else if(strcmp(choice,"code")==0){strcpy(code,replace);}
        else{cout<<"invalid set choice";}
    }
    void set_float(char choice[],float replace){
        if(strcmp(choice,"qty")==0){qty = int(replace);}
        else if(strcmp(choice,"price")==0){price = replace;}
        else if(strcmp(choice,"total")==0){total = replace;}
        else{cout<<"invalid set choice";}
    }
    char get_char(char choice[]){
        if(strcmp(choice,"name")==0){return name;}
        else if(strcmp(choice,"code")==0){return code;}
        else{cout<<"invalid get choice";}
    }
    float get_float(char choice[]){
        if(strcmp(choice,"qty")==0){return qty;}
        else if(strcmp(choice,"price")==0){return price;}
        else if(strcmp(choice,"total")==0){return total;}
        else{cout<<"invalid get choice";}
    }

    void calculate(){
        total = price*qty;
    }
    void print(){
        cout<<"=========================="<<endl;
        cout<<"\t RECIEPT"<<endl;
        cout<<"=========================="<<endl;
        cout<<"Name\t\t: "<<name<<endl;
        cout<<"product code\t:"<<code<<endl;
        cout<<"quantity code\t: "<<qty<<endl;
        cout<<"Product price\t: "<<price<<endl;
        cout<<"total Payment\t: "<<total;
    }
};

    int main(){
        cout<<fixed<<setprecision(2);
        char contin,inputc[30];
        float inputf;
        Purchase p;
        do
        {
            cout<<"=========================="<<endl;
            cout<<"\t Welcome"<<endl;
            cout<<"=========================="<<endl;
            cout<<"Enter name\t:";
            cin>>inputc;
            p.set_char("name",inputc);
            cout<<"Product code\t:";
            cin>>inputc;
            p.set_char("code",inputc);
            cout<<"Enter quantity\t:";
            cin>>inputf;
            p.set_float("qty",inputf);
            cout<<"Enter price\t:";
            cin>>inputf;
            p.set_float("price",inputf);
            p.calculate();
            p.print();
            cout<<"\nyou have another customer to purchase item? [Y/N]: ";
            cin>>contin;
        } while (contin=='Y'||contin=='y');
        
        
        
    }

