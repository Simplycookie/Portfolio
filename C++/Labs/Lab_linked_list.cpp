#include <iostrema>
using namespace std;

struct node
{
    int val;
    node *link;
};

int link_list_manager(node &head,int mode,int val){
    int retrun_value;
    node *temp = head;
    node *pre;

    switch (mode)
    {
    case 1: //add to the link list
        while (temp!=NULL)
        {
            pre=temp;
            temp = head.link;
        }
        temp = new node;
        temp->val = val;
        pre->link = temp;
        break;

    case 2: //delete 
    
    default:
        break;
    }

}
