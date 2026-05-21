#include<iostream>
#include<cmath>
using namespace std;
int Logical_flag_set(string binary_str){
    int flag = 0;
    int j = 0;
    cout<<binary_str.length()<<endl;
    for(int i=(binary_str.length()-1); i>=0; i--){
        if(binary_str[i] == '1'){
            flag += pow(2,j);
            cout<<int(pow(2,j))<<" ";
            //cout<<flag<<" ";
        }
        j++;
    };
    return flag;
}

void Logical_flag_check(int flag){
    string binary_str;
    int binand = 0;
    for(int i=0; i<32; i++){
        binand = flag & int(pow(2,i));
        if(binand != 0){
            binary_str = '1' + binary_str;
        }
        else{
            binary_str = '0' + binary_str;
        }
    }
    string binary_rep;
    bool front_found = false;
    for(int i=0; i<32; i++){
        if(front_found == true){
            binary_rep += binary_str[i];
        }
        else{
        if(binary_str[i] == '1'){
            front_found = true;
            i--;
        }}
    }
    cout<<binary_rep<<endl;
}

int main(){
    int flags[5] = {0,0,0,0,0};
    flags[0] = Logical_flag_set("111111110001000100100101010011");
    cout<<endl<<flags[0]<<endl;
    Logical_flag_check(flags[0]);
}