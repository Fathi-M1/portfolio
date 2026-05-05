import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { View, TouchableOpacity, Text } from 'react-native';
import { BlurView } from 'react-native-blur';
import { Ionicons } from '@expo/vector-icons';
import Landing from './screens/Landing';
import Coder from './screens/Coder';
import Designer from './screens/Designer';

const Stack = createStackNavigator();
const Tab = createBottomTabNavigator();

function CustomTabBar({ state, descriptors, navigation }) {
  return (
    <BlurView
      style={{
        position: 'absolute',
        bottom: 30,
        left: 20,
        right: 20,
        height: 65,
        borderRadius: 24,
        borderWidth: 1,
        borderColor: '#0D9488',
        backgroundColor: 'rgba(255, 255, 255, 0.7)',
      }}
      blurType="light"
      blurAmount={10}
    >
      <View style={{ flexDirection: 'row', padding: 10, gap: 10, height: '100%', alignItems: 'center' }}>
        {state.routes.map((route, index) => {
          const isFocused = state.index === index;
          const onPress = () => {
            navigation.navigate(route.name);
          };
          const iconName = route.name === 'Coder' ? 'code' : 'palette';
          return (
            <TouchableOpacity
              key={route.key}
              onPress={onPress}
              style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}
            >
              <Ionicons
                name={iconName}
                size={24}
                color={isFocused ? (route.name === 'Coder' ? '#0D9488' : '#F97316') : '#9CA3AF'}
              />
              <Text style={{
                color: isFocused ? (route.name === 'Coder' ? '#0D9488' : '#F97316') : '#9CA3AF'
              }}>
                {route.name}
              </Text>
            </TouchableOpacity>
          );
        })}
      </View>
    </BlurView>
  );
}

function TabNavigator() {
  return (
    <Tab.Navigator
      tabBar={(props) => <CustomTabBar {...props} />}
      screenOptions={{ headerShown: false }}
    >
      <Tab.Screen name="Coder" component={Coder} />
      <Tab.Screen name="Designer" component={Designer} />
    </Tab.Navigator>
  );
}

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator screenOptions={{ headerShown: false }}>
        <Stack.Screen name="Landing" component={Landing} />
        <Stack.Screen name="Portfolio" component={TabNavigator} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
      const percent = (clientX / window.innerWidth) * 100;
      setSplitPercent(Math.max(0, Math.min(100, percent)));
    }
  };

  const onMouseMove = (e) => handlePointerMove(e.clientX, e.clientY);
  const onTouchMove = (e) => {
    if (e.touches.length > 0) {
      handlePointerMove(e.touches[0].clientX, e.touches[0].clientY);
    }
  };

  // Adjust clip path based on device mode
  const clipPathValue = isMobile
    ? `inset(0 0 calc(100% - ${splitPercent}%) 0)` // Top vs Bottom split
    : `inset(0 calc(100% - ${splitPercent}%) 0 0)`; // Left vs Right split

  return (
    <div 
      className="relative h-screen w-full overflow-hidden bg-slate-100 flex flex-col md:flex-row select-none"
      onMouseMove={onMouseMove}
      onTouchMove={onTouchMove}
      // Added cursor styling to indicate interactive resize based on axis
      style={{ cursor: isMobile ? 'ns-resize' : 'ew-resize' }}
    >
      
      {/* ========== RIGHT/BOTTOM LAYER: DEVELOPER ========== */}
      {/* This is the base layer, always fully rendered in the DOM behind the designer */}
      <div className="absolute inset-0 bg-slate-900 border-t-4 md:border-t-0 md:border-l-4 border-slate-700 flex flex-col items-center justify-end md:justify-center md:items-end p-10 font-developer text-emerald-400 z-0 pointer-events-none">
        <div className="relative z-10 text-center md:text-right max-w-lg mb-20 md:mb-0 md:mr-[10%]">
          <h1 className="text-4xl md:text-6xl font-bold tracking-tighter mb-4">&lt;Developer /&gt;</h1>
          <p className="text-lg md:text-xl text-slate-400">
            const skills = ['React', 'Tailwind', 'Node.js'];<br/>
            return success;
          </p>
        </div>
        
        {/* Developer PNG */}
        <div className="absolute bottom-0 inset-x-0 md:inset-auto md:right-[50%] md:translate-x-[50%] w-full max-w-[400px] mx-auto opacity-80 mix-blend-screen pointer-events-none flex justify-center object-cover">
            <img src="/coder.png" alt="Developer" className="max-h-[60vh] object-contain" draggable={false} />
        </div>
      </div>

      {/* ========== LEFT/TOP LAYER: DESIGNER ========== */}
      {/* This is the overlaid layer we are applying the clip-path mask to */}
      <div 
        className="absolute inset-0 bg-rose-50 flex flex-col items-center justify-start md:justify-center md:items-start p-10 font-designer text-slate-800 z-10 pointer-events-none"
        style={{ 
          clipPath: clipPathValue,
          // CSS transition to create that high-end 'lag' and easing effect tracking the cursor
          transition: 'clip-path 0.1s ease-out'
        }}
      >
        <div className="relative z-10 text-center md:text-left max-w-lg mt-20 md:mt-0 md:ml-[10%]">
            <h1 className="text-5xl md:text-7xl font-bold tracking-tight mb-4 text-purple-900">Designer.</h1>
            <p className="text-xl md:text-2xl text-slate-600 italic">
              Crafting elegant, functional,<br className="hidden md:block"/> and human-centered experiences.
            </p>
        </div>

        {/* Designer PNG */}
        <div className="absolute bottom-0 inset-x-0 md:inset-auto md:left-[50%] md:-translate-x-[50%] w-full max-w-[400px] mx-auto opacity-100 pointer-events-none flex justify-center">
            <img src="/designer.png" alt="Designer" className="max-h-[60vh] object-contain drop-shadow-2xl" draggable={false} />
        </div>

        {/* The Divider Line */}
        {isMobile ? (
            <div className="absolute bottom-0 left-0 w-full h-[6px] bg-indigo-500 shadow-[0_0_20px_rgba(99,102,241,0.5)] z-20"></div>
        ) : (
            <div className="absolute top-0 right-0 h-full w-[6px] bg-indigo-500 shadow-[0_0_30px_rgba(99,102,241,0.6)] z-20"></div>
        )}
      </div>
          
    </div>
  );
}
