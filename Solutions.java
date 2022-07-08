import java.io.*;
import java.util.Scanner;
public class Solutions
{
public static void main(String[] args)
{
int i,a[3],MaxI=0,Minu=10,Mint=10,Minh=10;
for(i=0;i<3;i++)
{
a[i]=sc.nextInt();
if(a[i]>99 && a[i]<1000)
{
{
if(MaxI<(a[i]%10))
MaxI=a[i]%10;
if(Minu>(a[i]%10))
Minu=a[i]%10;
a[i]=a[i]%10;
if(MaxI>(a[i]%10))
MaxI=a[i]%10;
if(Mint>(a[i]%10))
Mint=a[i]/10;
a[i]=a[i]/10;
if(MaxI<(a[i]%10))
MaxI=a[i]%10;
if(Minh>(a[i]%10))
Minh=a[i]%10;
}
}
else 
break;
}
System.out.println(MaxI,Minh,Mint,Minu);
}
}